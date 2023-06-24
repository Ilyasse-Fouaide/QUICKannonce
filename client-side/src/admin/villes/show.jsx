import React, { useContext, useEffect, useState } from 'react'
import userContext from '../../context'
import SidebarUser from '../../layouts/user/sidebar';
import SidebarAdmin from '../../layouts/admin/sidebar';
import Panel from '../../admin/Panel';
import axios from 'axios';
import { Link, useParams } from 'react-router-dom';

function Show() {
  const { user, error, loading } = useContext(userContext);

  const { id } = useParams();

  const [ville, setVile] = useState();

  useEffect(() => {
    axios.get(`http://127.0.0.1:8000/api/admin/ville/${id}`, {
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('access_token')}`
      }
    }).then((response) => {
      setVile(response.data);
      console.log(response.data);
    })
  }, []);

  if (loading) {
    return "Loading..."
  }

  if (error?.status === 401) {
    window.location.href = '/'
  }

  if (user?.role !== "admin") {
    window.location.href = '/'
  }

  return (
    <div>
      <div class="row mb-2">
        <div>
          {localStorage.getItem('access_token') && <a href="#">Mes Annonces</a>}
        </div>
      </div>

      <div class="row">

        <div class="col-3">
          <div>
            {localStorage.getItem('access_token') ?
              (<>
                {user?.role === "admin" ?
                  <>
                    <SidebarAdmin />
                  </> :
                  <>
                    <SidebarUser />
                  </>
                }
              </>) : (
                <SidebarUser />
              )
            }
          </div>
        </div>

        <div class="col">
          {localStorage.getItem('access_token') &&
            <>
              {user?.role === "admin" &&
                <>
                  <Panel />
                </>
              }
            </>
          }

          <div>
            <Link to={`/ville/create`}>
              <div className="btn btn-primary">Add</div>
            </Link>
            <table class="table">
              <thead>
                <tr class="text-center">
                  <td>ID</td>
                  <td>Nom caegory</td>
                </tr>
              </thead>
              <tbody>
                <tr className='text-center'>
                  <td>{ville?.id}</td>
                  <td>{ville?.nom_ville}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div >
  )
}

export default Show