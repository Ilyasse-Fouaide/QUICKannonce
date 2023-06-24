import React, { useContext, useEffect, useState } from 'react'
import userContext from '../../context'
import SidebarUser from '../../layouts/user/sidebar';
import SidebarAdmin from '../../layouts/admin/sidebar';
import Panel from '../../admin/Panel';
import axios from 'axios';

function Index() {
  const { user, error, loading } = useContext(userContext);

  const [membre, setMembre] = useState([]);

  if (error?.status === 401) {
    window.location.href = '/'
  }

  if (user?.role !== "admin") {
    window.location.href = '/'
  }

  useEffect(() => {
    axios.get('http://127.0.0.1:8000/api/admin/membres', {
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('access_token')}`
      }
    }).then((response) => {
      setMembre(response.data);
      console.log(response.data);
    })
  }, []);

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
            <table class="table">
              <thead>
                <tr class="text-center">
                  <td>ID</td>
                  <td>Name</td>
                  <td>Prenom</td>
                  <td>Delete</td>
                </tr>
              </thead>
              <tbody>
                {membre && membre.map((row) => (
                  <tr className='text-center'>
                    <td>{row.id}</td>
                    <td>{row.nom}</td>
                    <td>{row.prenom}</td>
                    <td>
                      <button className='btn btn-danger' onClick={() => {
                        axios.delete(`http://127.0.0.1:8000/api/admin/delete-membre/${row.id}`, {
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