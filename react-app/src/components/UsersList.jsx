import React, { useContext } from "react";
import DataContext from "../context/dataContext";

const UsersList = () => {
    const { data, loading, error } = useContext(DataContext);

    if (loading) return <p>Loading...</p>;
    if (error) return <p>Error: {error}</p>;

    return (
        <ul>
            {data.map((user) => (
                <li key={user.id}>{user.name}</li>
            ))}
        </ul>
    );
};

export default UsersList;