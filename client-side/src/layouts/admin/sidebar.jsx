import React from 'react'
import { Link } from 'react-router-dom'

function Sidebar() {
  return (
    <div class="list-group w-100">

      <Link to="/" class="list-group-item list-group-item-primary text-center">
        Acceuil
      </Link>

      <Link to="/annonce/pending-annonce" class="list-group-item list-group-item-primary text-center">
        Validatiion des annonces
      </Link>

      <Link to="/ville/index" class="list-group-item list-group-item-primary text-center">
        Gestion des ville
      </Link>

      <Link to="/category/index" class="list-group-item list-group-item-primary text-center">
        Gestion des categories
      </Link>

      <Link to="/membre/delete" class="list-group-item list-group-item-primary text-center">
        Supprimer un membre
      </Link>

      <Link to="/annonce/delete" class="list-group-item list-group-item-primary text-center">
        Supprimer un annonce
      </Link>

    </div>
  )
}

export default Sidebar