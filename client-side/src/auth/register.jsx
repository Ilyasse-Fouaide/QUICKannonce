import axios from 'axios';
import React, { useState } from 'react'
function Register() {

  const [username, setUsername] = useState(null);
  const [nom, setNom] = useState(null);
  const [prenom, setPrenom] = useState(null);
  const [email, setEmail] = useState(null);
  const [password, setPassword] = useState(null);
  const [comfirm_password, setComfirm_password] = useState(null);
  const [telephone, setTelephone] = useState(null);
  const [gender, setGender] = useState(null);

  const [error, setError] = useState();

  function register(ev) {
    ev.preventDefault();

    axios.post('http://127.0.0.1:8000/api/sign-up', {
      username,
      nom,
      prenom,
      email,
      password,
      comfirm_password,
      telephone,
      gender,
    }, {
      headers: {
        'Content-Type': 'application/json'
      }
    })
      .then((response) => {
        sessionStorage.setItem('message', response.data.message);

        window.location.href = '/sign-up'
      })
      .catch((error) => {
        console.log(error.response.data);
      });
  }


  return (
    <form onSubmit={register}>

      <div class="row mb-2">
        <div class="col-3">
          <label>Nom d'utilisateur</label>
        </div>
        <div class="col">
          <input type="text" class="form-control" onChange={(e) => setUsername(e.target.value)} />
          <div class="text-danger" style={{ fontSize: "small" }}>{error?.errors.username[0]}</div>
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-3">
          <label>votre nom</label>
        </div>
        <div class="col">
          <input type="text" class="form-control" name="nom" onChange={(e) => setNom(e.target.value)} />
          {/* // ! <div class="text-danger" style="font-size: small;">{{ $message }}</div> */}
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-3">
          <label>votre prenom</label>
        </div>
        <div class="col">
          <input type="text" class="form-control" name="prenom" onChange={(e) => setPrenom(e.target.value)} />
          {/* // ! <div class="text-danger" style="font-size: small;">{{ $message }}</div> */}
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-3">
          <label>votre email</label>
        </div>
        <div class="col">
          <input type="email" class="form-control" name="email" onChange={(e) => setEmail(e.target.value)} />
          {/* // ! <div class="text-danger" style="font-size: small;">{{ $message }}</div> */}
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-3">
          <label>votre password</label>
        </div>
        <div class="col">
          <input type="password" class="form-control" name="password" onChange={(e) => setPassword(e.target.value)} />
          {/* // ! <div class="text-danger" style="font-size: small;">{{ $message }}</div> */}
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-3">
          <label>comfirm password</label>
        </div>
        <div class="col">
          <input type="password" class="form-control" name="comfirm_password" onChange={(e) => setComfirm_password(e.target.value)} />
          {/* // ! <div class="text-danger" style="font-size: small;">{{ $message }}</div> */}
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-3">
          <label>votre telephone</label>
        </div>
        <div class="col">
          <input type="text" class="form-control" name="telephone" onChange={(e) => setTelephone(e.target.value)} />
          {/* // ! <div class="text-danger" style="font-size: small;">{{ $message }}</div> */}
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-3">
          <label>votre genre</label>
        </div>
        <div class="col">
          <select name="gender" class="form-control" onChange={(e) => setGender(e.target.value)} >
            <option selected disabled hidden>-- Sélectionner le genre --</option>
            <option value="homme">Homme</option>
            <option value="femme">femme</option>
          </select>
          {/* // ! <div class="text-danger" style="font-size: small;">{{ $message }}</div> */}
        </div>
      </div>

      <div class="row mb-2">
        <div class="col">
          <button type="submit" class="btn btn-primary form-control">Register</button>
        </div>
      </div>
    </form>
  )
}

export default Register