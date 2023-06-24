import React from 'react'
import Login from "./login";
import Register from "./register";
import Sidebar from "../layouts/user/sidebar";

function Main() {
  return (
    <div class="row mt-5">

      <div class="col-3">
        <div class="">
          <Login />
        </div>
        <hr />
        <div>
          <Sidebar />
        </div>
      </div>

      <div class=" col">
        <Register />
      </div>

    </div>
  )
}

export default Main