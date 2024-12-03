import React, { createContext, useState, useEffect } from "react";
import axios from "../axiosInstance";

const dataContext = createContext();

export const DataProvider = ({ children }) => {
    const [data, setData] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await axios.get("/users");
                setData(response.data);
            } catch (err) {
                setError(err.message);
            } finally {
                setLoading(false);
            }
        };
        fetchData();
    }, []);

    return (
        <dataContext.Provider value={{ data, loading, error }}>
        {children}
        </dataContext.Provider>
    );

};

export default dataContext;
