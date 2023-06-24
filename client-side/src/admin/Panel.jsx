import React from "react";
import { Link } from "react-router-dom";

function Panel() {
	return (
		<div style={{ border: "1px solid #052c65" }} class="mb-3">
			<div class="blue-800" style={{ padding: "2px 20px" }}>
				<span class="text-light" style={{ fontWeight: "500" }}>PANEL D'ADMINISTRATION</span>
			</div>

			<div className="d-flex justify-content-between align-items-center">

				<Link to="/annonce/pending-annonce">
					<div class="d-flex justify-content-center align-items-center bg-light p-2" style={{ gap: "20px" }}>
						<div class="border d-flex flex-column justify-content-between align-items-center" style={{ width: "190px", height: "150px", backgroundColor: "#fff", borderRadius: "10px", padding: "15px 0px" }}>
							<div></div>
							<div class="text-center" style={{ fontSize: "smaller" }}>Validation des annonces</div>
						</div>
					</div>
				</Link>

				<Link to="/category/index">
					<div class="d-flex justify-content-center align-items-center bg-light p-2" style={{ gap: "20px" }}>
						<div class="border d-flex flex-column justify-content-between align-items-center" style={{ width: "190px", height: "150px", backgroundColor: "#fff", borderRadius: "10px", padding: "15px 0px" }}>
							<div></div>
							<div class="text-center" style={{ fontSize: "smaller" }}>gestion des category</div>
						</div>
					</div>
				</Link>

				<Link to="/ville/index">
					<div class="d-flex justify-content-center align-items-center bg-light p-2" style={{ gap: "20px" }}>
						<div class="border d-flex flex-column justify-content-between align-items-center" style={{ width: "190px", height: "150px", backgroundColor: "#fff", borderRadius: "10px", padding: "15px 0px" }}>
							<div></div>
							<div class="text-center" style={{ fontSize: "smaller" }}>Gestion des villes</div>
						</div>
					</div>
				</Link>

				<Link to="/membre/delete">
					<div class="d-flex justify-content-center align-items-center bg-light p-2" style={{ gap: "20px" }}>
						<div class="border d-flex flex-column justify-content-between align-items-center" style={{ width: "190px", height: "150px", backgroundColor: "#fff", borderRadius: "10px", padding: "15px 0px" }}>
							<div></div>
							<div class="text-center" style={{ fontSize: "smaller" }}>Supprimer un Membre</div>
						</div>
					</div>
				</Link>

				<Link to="/annonce/delete">
					<div class="d-flex justify-content-center align-items-center bg-light p-2" style={{ gap: "20px" }}>
						<div class="border d-flex flex-column justify-content-between align-items-center" style={{ width: "190px", height: "150px", backgroundColor: "#fff", borderRadius: "10px", padding: "15px 0px" }}>
							<div></div>
							<div class="text-center" style={{ fontSize: "smaller" }}>Supprimer des annonces</div>
						</div>
					</div>
				</Link>

			</div>

		</div>
	);
}

export default Panel;
