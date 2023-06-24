import { React, useContext } from "react";
import QuickAnnonce from "./assets/quick annonces-01-01";
import Deposer from "./assets/my second word(for ilyasse)-01-01";
import { Routes, Route, Link } from "react-router-dom";
import Main from "./auth/main"
import Index from "./annonces";
import userContext from "./context";
import CreateAnnonce from "./annonces/create";
import PendingAnnoce from './admin/annoces/index';
import DeleteAnnoce from './admin/annoces/all';
import DeleteMembre from './admin/membres/index';

import CateggotyIndex from './admin/category/index';
import CategoryShow from './admin/category/show';
import CategoryEdit from './admin/category/edit';
import CategoryCreate from './admin/category/create';

import VilleIndex from './admin/villes/index';
import VilleShow from './admin/villes/show';
import VilleEdit from './admin/villes/edit';
import VilleCreate from './admin/villes/create';

function App() {
  const { user, loading } = useContext(userContext);

  // if (loading) {
  //   return "Loading ...";
  // }

  const logout = () => {
    localStorage.removeItem("access_token");
    window.location.reload();
  }

  return (
    <>
      <div style={{ width: "80%", margin: "auto" }}>

        {localStorage.getItem('access_token') && (
          <>
            {user?.role === "user" &&
              <>
                {/* // ! panel user */}
                <div className="d-flex justify-content-between align-items-center text-light blue-800" style={{ padding: "2px 18px;" }}>
                  <div className="col-8" style={{ textDecoration: "underline;" }}>Panel Membre</div>
                  <div className="col" style={{ textAlign: "right;" }}>
                    <a href="#" className="text-light" style={{ textDecoration: "underline;" }}>Welome {user.username} </a>
                  </div>
                  <div className="col" style={{ textAlign: "right;" }}>
                    <button className="btn text-light" style={{ textDecoration: "underline;" }} onClick={logout}>Deconexion</button>
                  </div>
                </div>
              </>
            }

            {user?.role === "admin" &&
              <>
                {/* // ! panel admin */}
                <div className="d-flex justify-content-between align-items-center text-light blue-800" style={{ padding: "2px 18px;" }}>
                  <div className="col-8" style={{ textDecoration: "underline;" }}>Panel Admin</div>
                  <div className="col" style={{ textAlign: "right;" }}>
                    <a href="#" className="text-light" style={{ textDecoration: "underline;" }}>Welome Mr. {user.username} </a>
                  </div>
                  <div className="col" style={{ textAlign: "right;" }}>
                    <button className="btn text-light" style={{ textDecoration: "underline;" }} onClick={logout}>Deconexion</button>
                  </div>
                </div>
              </>
            }
          </>
        )}

        {!localStorage.getItem('access_token') && <>
          {/* // ! if user not authentified */}
          <div className="d-flex justify-content-between align-items-center text-light blue-800" style={{ padding: "2px 18px;" }}>
            <div className="col-8" style={{ textDecoration: "underline;" }}>
              <strong>Nouveau ! </strong>
              <span>Creez un compte aujourd'hui pour deposer votre annonce gratuit!</span>
            </div>
            <div className="col" style={{ textAlign: "right;" }}>
              <Link to="/sign-up" className="text-light" style={{ textDecoration: "underline;" }}>Creer un compte </Link>
            </div>
            <div className="col" style={{ textAlign: "right;" }}>
              <Link to="/sign-up" className="btn text-light" style={{ textDecoration: "underline;" }}>Se connecter</Link>
            </div>
          </div>
        </>}

        <div className="d-flex justify-content-between align-items-center mt-4" style={{ gap: "50px" }}>
          <div>
            {/* <!-- // ! LOGO --> */}
            <QuickAnnonce />
          </div>
          <form method="GET" className="input-group mb-3">
            <input type="text" className="form-control" placeholder="Que recherchez-vouz?" name="search" />
            <button className="input-group-text" style={{ backgroundColor: "#cfe2ff;" }}>Rechercher</button>
          </form>
          <div>
            <a href="#">
              {/* <!-- // ! LOGO --> */}
              <Link to={'/annonce/create'}>
                <Deposer />
              </Link>
            </a>
          </div>
        </div>

        <div className="d-flex justify-content-between text-center mt-4">
          <a href="/" className="bg-primary form-control" style={{ borderRadius: "10px 0px 0px 0px", color: "#fff" }}>Acceuil</a>
          <a href="#" className="bg-primary form-control" style={{ borderRadius: "0", color: "#fff" }}>Immobilise</a>
          <a href="#" className="bg-primary form-control" style={{ borderRadius: "0", color: "#fff" }}>Multimedia</a>
          <a href="#" className="bg-primary form-control" style={{ borderRadius: "0", color: "#fff" }}>Maison</a>
          <a href="#" className="bg-primary form-control" style={{ borderRadius: "0", color: "#fff" }}>Vehicules</a>
          <a href="#" className="bg-primary form-control" style={{ borderRadius: "0", color: "#fff" }}>Emploie et Services</a>
          <a href="#" className="bg-primary form-control" style={{ borderRadius: "0px 10px 3px 0px", color: "#fff" }}>Objets Personnels</a>
        </div>

        <div className="mt-2" style={{ marginBottom: "250px" }}>
          <Routes>
            <Route path="/" element={<Index />} />
            <Route path="/sign-up" element={<Main />} />
            <Route path="/annonce/create" element={<CreateAnnonce />} />
            <Route path="/annonce/pending-annonce" element={<PendingAnnoce />} />
            <Route path="/annonce/delete" element={<DeleteAnnoce />} />
            <Route path="/membre/delete" element={<DeleteMembre />} />

            <Route path="/category/index" element={<CateggotyIndex />} />
            <Route path="/category/:id" element={<CategoryShow />} />
            <Route path="/category/:id/edit" element={<CategoryEdit />} />
            <Route path="/category/create" element={<CategoryCreate />} />

            <Route path="/ville/index" element={<VilleIndex />} />
            <Route path="/ville/:id" element={<VilleShow />} />
            <Route path="/ville/:id/edit" element={<VilleEdit />} />
            <Route path="/ville/create" element={<VilleCreate />} />
          </Routes>
        </div>

      </div>
    </>
  );
}

export default App;
