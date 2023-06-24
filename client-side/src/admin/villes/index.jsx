import React, { useContext, useEffect, useState } from 'react'
import userContext from '../../context'
import SidebarUser from '../../layouts/user/sidebar';
import SidebarAdmin from '../../layouts/admin/sidebar';
import Panel from '../../admin/Panel';
import axios from 'axios';
import { Link } from 'react-router-dom';

function Index() {
  const { user, error, loading } = useContext(userContext);

  const [ville, setVile] = useState();

  useEffect(() => {
    axios.get('http://127.0.0.1:8000/api/admin/ville', {
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('access_token')}`
      }
    }).then((response) => {
      setVile(response.data);
      console.log(response.data);
    })
  }, []);

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
                {ville && ville.map((row) => (
                  <tr className='text-center'>
                    <td>{row.id}</td>
                    <td>{row.nom_ville}</td>
                    <td>
                      <Link to={`/ville/${row.id}`}>
                        <button className='btn btn-info'>Show</button>
                      </Link>
                      <Link to={`/ville/${row.id}/edit`}>
                        <button className='btn btn-success'>Edit</button>
                      </Link>
                      <button className='btn btn-danger' onClick={() => {
                        axios.delete(`http://127.0.0.1:8000/api/admin/ville/${row.id}`, {
                          headers: {
                            'Content-Type': 'application/json',
                            'Authorization': `Bearer ${localStorage.getItem('access_token')}`
                          }
                        })
                          .then((response) => window.location.reload())
                      }}>Delete</button>
                    </td>
                  </tr>
                ))}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div >
  )
}

export default Index