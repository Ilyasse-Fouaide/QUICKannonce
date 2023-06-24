import axios from 'axios';
import React, { useState } from 'react'

function Login() {
  const [username, setUsername] = useState(null);
  const [password, setPassword] = useState(null);

  const message = sessionStorage.getItem('message');

  setTimeout(() => {
    sessionStorage.removeItem('message')
  }, 5000)


  function login(ev) {
    ev.preventDefault();

    axios.post('http://127.0.0.1:8000/api/sign-in', {
      username,
      password,
    }, {
      headers: {
        "Content-Type": "application/json",
      }
    })
      .then((response) => {
        localStorage.setItem('access_token', response.data.access_token)
        window.location.href = '/'
      })
      .catch((error) => {
        alert('You have some Error try again : ' + error.response.data.message)
      });
  }

  return (
    <form onSubmit={login}>


      {message && (
        <div class="row mb-2">
          <div className="alert alert-success">{message}</div>
        </div>
      )}

      <div class="row mb-2">
        <div class="col-3">
          <label>Username</label>
        </div>
        <div class="col">
          <input type="text" class="form-control" onChange={(e) => setUsername(e.target.value)} />
          {/* // ! <div class="text-danger" style="font-size: small;">{{ $message }}</div> */}
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-3">
          <label>Password</label>
        </div>
        <div class="col">
          <input type="password" class="form-control" name="password" onChange={(e) => setPassword(e.target.value)} />
          {/* // ! <div class="text-danger" style="font-size: small;">{{ $message }}</div> */}
        </div>
      </div>

      <div class="row mb-2">
        <div class="col">
          <button type="submit" class="btn btn-primary form-control">Login</button>
        </div>
      </div>
    </form>
  )
}

export default Login