import React from 'react'

function Sidebar() {
  return (
    <div class="list-group w-100">
      <a href="/" class="list-group-item list-group-item-primary ">
        Accueil
      </a>
      <a class="list-group-item list-group-item-primary">Immobilier</a>
      <a class="list-group-item list-group-item-primary">Multimédia</a>
      <a class="list-group-item list-group-item-primary">Maison</a>
      <a class="list-group-item list-group-item-primary">Véhicules</a>
      <a class="list-group-item list-group-item-primary">Emploi et Services</a>
      <a class="list-group-item list-group-item-primary">Objets Personnels</a>
    </div>
  )
}

export default Sidebar