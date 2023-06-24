import React, { useContext, useEffect, useState } from 'react'
import userContext from '../context'
import SidebarUser from '../layouts/user/sidebar';
import SidebarAdmin from '../layouts/admin/sidebar';
import Panel from '../admin/Panel';
import axios from 'axios';

function Index() {

  const { user, error, loading } = useContext(userContext);

  const [annonces, setAnnonces] = useState([]);

  useEffect(() => {
    axios.get('http://127.0.0.1:8000/api/admin/annonce', {
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('access_token')}`
      }
    }).then((response) => {
      console.log(response.data);
      setAnnonces(response.data);
    });
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
                  <td>Images</td>
                  <td>Titre</td>
                  <td>Prix</td>
                  <td>Ville</td>
                  <td>Category</td>
                  <td>Date</td>
                </tr>
              </thead>
              <tbody>
                {annonces && annonces.map((row) => (
                  <tr className='text-center'>
                    <td>
                      <img src={`http://127.0.0.1:8000/${row.images[0].filename}`} width="50px" />
                    </td>
                    <td>{row.title}</td>
                    <td>{row.description}</td>
                    <td>{row.ville.nom_ville}</td>
                    <td>{row.category.nom_category}</td>
                    <td>{row.created_at}</td>
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