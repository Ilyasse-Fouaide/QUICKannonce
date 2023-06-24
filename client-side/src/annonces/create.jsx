import React, { useContext, useEffect, useState } from 'react'
import userContext from '../context';
import SidebarUser from '../layouts/user/sidebar';
import SidebarAdmin from '../layouts/admin/sidebar';
import Panel from '../admin/Panel';
import axios from 'axios';

function Create() {
  const { user, error, loading } = useContext(userContext);

  const [category, setcategory] = useState(null);
  const [ville, setville] = useState(null);
  const [title, settitle] = useState(null);
  const [description, setdescription] = useState(null);
  const [price, setprice] = useState(null);
  const [image01, setimage01] = useState(null);
  const [image02, setimage02] = useState(null);
  const [image03, setimage03] = useState(null);
  const [image04, setimage04] = useState(null);
  const [image05, setimage05] = useState(null);

  const [cat, setCat] = useState([]);
  const [vil, setVil] = useState([]);

  useEffect(() => {
    axios.get('http://127.0.0.1:8000/api/admin/category', {
      headers: {
        'Authorization': `Bearer ${localStorage.getItem('access_token')}`,
        "Content-Type": "application/json",
      }
    })
      .then((response) => {
        setCat(response.data);
      });


    axios.get('http://127.0.0.1:8000/api/admin/ville', {
      headers: {
        'Authorization': `Bearer ${localStorage.getItem('access_token')}`,
        "Content-Type": "application/json",
      }
    })
      .then((response) => {
        setVil(response.data);
      });
  }, []);

  if (error?.status === 401) {
    window.location.href = '/'
  }

  if (user?.role !== "admin") {
    window.location.href = '/'
  }

  function save(e) {
    e.preventDefault();
    const formData = {
      nom: user?.nom,
      email: user?.email,
      telephone: user?.telephone,
      user: user?.id,
      category,
      ville,
      title,
      description,
      price,
      image01,
      image02,
      image03,
      image04,
      image05
    };
    axios
      .post('http://127.0.0.1:8000/api/admin/annonce', formData, {
        headers: {
          'Content-Type': 'multipart/form-data',
          'Authorization': `Bearer ${localStorage.getItem('access_token')}`
        }
      }).then((response) => {
        window.location.href = '/';
      }).catch((error) => {
        console.log(error.response.data)
      })
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
            <form onSubmit={save} method="post" encType='multipart/form-data'>

              <div class="row mb-2">
                <div class="col-3">
                  <label>Votre nom</label>
                </div>
                <div class="col">
                  <input type="text" class="form-control" value={user?.nom} readonly />
                </div>
              </div>

              <div class="row mb-2">
                <div class="col-3">
                  <label>Votre nom</label>
                </div>
                <div class="col">
                  <input type="text" class="form-control" name="email" value={user?.email} readonly />
                </div>
              </div>

              <div class="row mb-2">
                <div class="col-3">
                  <label>Votre nom</label>
                </div>
                <div class="col">
                  <input type="text" class="form-control" name="telephone" value={user?.telephone} readonly />
                </div>
              </div>

              <div class="row mb-2" style={{ display: "none" }}>
                <div class="col-3">
                  <label>Votre nom</label>
                </div>
                <div class="col">
                  <input type="text" class="form-control" name="user" value={user?.id} readonly />
                </div>
              </div>

              <div class="row mb-2" >
                <div class="col-3">
                  <label>Votre category</label>
                </div>
                <div class="col">
                  <select name="category" class="form-select" onChange={(e) => setcategory(e.target.value)}>
                    <option value={""}>Category</option>
                    {cat && cat.map((row) => (
                      <option value={row.id}>{row.nom_category}</option>
                    ))}
                  </select>
                </div>
              </div>

              <div class="row mb-2" >
                <div class="col-3">
                  <label>Votre ville</label>
                </div>
                <div class="col">
                  <select name="ville" class="form-select" onChange={(e) => setville(e.target.value)}>
                    <option value={""}>Ville</option>
                    {vil && vil.map((row) => (
                      <option value={row.id}>{row.nom_ville}</option>
                    ))}
                  </select>
                </div>
              </div>

              <div class="row mb-2">
                <div class="col-3">
                  <label>Title</label>
                </div>
                <div class="col">
                  <input type="text" class="form-control" name="title" onChange={(e) => settitle(e.target.value)} />
                </div>
              </div>

              <div class="row mb-2">
                <div class="col-3">
                  <label>Description de l'annonce</label>
                </div>
                <div class="col">
                  <textarea class="form-control" name="description" cols="30" rows="5" onChange={(e) => setdescription(e.target.value)}></textarea>
                </div>
              </div>

              <div class="row mb-2">
                <div class="col-3">
                  <label>Price</label>
                </div>
                <div class="col">
                  <input type="text" class="form-control" name="price" onChange={(e) => setprice(e.target.value)} />
                </div>
              </div>

              <div class="row mb-2">
                <div class="col-3">
                  <label>Photos</label>
                </div>
                <div class="col">
                  <input type="file" name="image01" class="form-control mb-1" onChange={(e) => setimage01(e.target.files[0])} />
                  <input type="file" name="image02" class="form-control mb-1" onChange={(e) => setimage02(e.target.files[0])} />
                  <input type="file" name="image03" class="form-control mb-1" onChange={(e) => setimage03(e.target.files[0])} />
                  <input type="file" name="image04" class="form-control mb-1" onChange={(e) => setimage04(e.target.files[0])} />
                  <input type="file" name="image05" class="form-control" onChange={(e) => setimage05(e.target.files[0])} />
                </div>
              </div>

              <div class="row mb-2">
                <button type='submit' className='btn btn-primary'>Save</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div >
  )
}

export default Create