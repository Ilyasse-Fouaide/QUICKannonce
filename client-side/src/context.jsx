import axios from "axios";
import { createContext, useEffect, useState } from "react";

const userContext = createContext()
export default userContext;

export function UserContextProvider({ children }) {
  const [user, setUser] = useState(null);
  const [error, setError] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    axios.get("http://127.0.0.1:8000/api/profile", {
      headers: {
        'Authorization': `Bearer ${localStorage.getItem('access_token')}`,
        "Content-Type": "application/json",
      }
    }).then((response) => {
      setUser(response.data);
      setLoading(false);
    }).catch((error) => {
      setError(error.response);
    });
  }, []);

  return (
    <userContext.Provider value={{ user, setUser, error, setError, loading, setLoading }}>
      {children}
    </userContext.Provider>
  )
}
