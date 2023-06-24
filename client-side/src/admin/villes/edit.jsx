import React, { useContext, useEffect, useState } from 'react'
import userContext from '../../context'
import SidebarUser from '../../layouts/user/sidebar';
import SidebarAdmin from '../../layouts/admin/sidebar';
import Panel from '../../admin/Panel';
import axios from 'axios';
import { Link, useParams } from 'react-router-dom';

function Edit() {
  const { user, error, loading } = useContext(userContext);

  const { id } = useParams();

  const [ville, setVile] = useState();

  useEffect(() => {
    axios.get(`http://127.0.0.1:8000/api/admin/ville/${id}/edit`, {
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('access_token')}`
      }
    }).then((response) => {
      setVile(response.data);
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

  function handleSubmit(e) {
    e.preventDefault();
    axios.put(`http://127.0.0.1:8000/api/admin/ville/${id}`, { nom_ville: ville }, {
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('access_token')}`
      }
    }).then((res) => {
      window.location.href = '/ville/index'
    });
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
              <div className="btn btn-primary mb-2">Add</div>
            </Link>
            <form onSubmit={handleSubmit}>
              <input type="text" className='form-control mb-2' value={ville?.id} readOnly disabled />

              <input type="text" className='form-control mb-2' value={ville?.nom_ville} onChange={(e) => setVile(e.target.value)} />


              <button type='submit' className='btn btn-success'>Edit</button>
            </form>
          </div>
        </div>
      </div>
    </div >
  )
}

export default Edit