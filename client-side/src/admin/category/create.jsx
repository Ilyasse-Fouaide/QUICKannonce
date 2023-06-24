import React, { useContext, useEffect, useState } from 'react'
import userContext from '../../context'
import SidebarUser from '../../layouts/user/sidebar';
import SidebarAdmin from '../../layouts/admin/sidebar';
import Panel from '../../admin/Panel';
import axios from 'axios';
import { Link } from 'react-router-dom';

function Create() {
  const { user, error, loading } = useContext(userContext);

  const [category, setCategory] = useState();

  if (loading) {
    return "Loadong..."
  }

  if (error?.status === 401) {
    window.location.href = '/'
  }

  if (user?.role !== "admin") {
    window.location.href = '/'
  }

  function handleSubmit(e) {
    e.preventDefault();
    axios.post(`http://127.0.0.1:8000/api/admin/category`, { nom_category: category }, {
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('access_token')}`
      }
    }).then((res) => {
      window.location.href = '/category/index'
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
            <Link to={`/category/create`}>
              <div className="btn btn-primary mb-2">Add</div>
            </Link>
            <form onSubmit={handleSubmit}>

              <input type="text" className='form-control mb-2' onChange={(e) => setCategory(e.target.value)} />


              <button type='submit' className='btn btn-success'>Save</button>
            </form>
          </div>
        </div>
      </div>
    </div >
  )
}

export default Create