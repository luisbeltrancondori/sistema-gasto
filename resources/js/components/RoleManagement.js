import React, { useState, useEffect } from 'react';
import axios from 'axios';

const RoleManagement = () => {
    const [roles, setRoles] = useState([]);
    const [roleName, setRoleName] = useState('');
    const [permissions, setPermissions] = useState([]);
    const [selectedPermissions, setSelectedPermissions] = useState([]);
    const [error, setError] = useState('');

    useEffect(() => {
        fetchRoles();
        fetchPermissions();
    }, []);

    const fetchRoles = async () => {
        try {
            const response = await axios.get('/roles');
            setRoles(response.data);
        } catch (err) {
            setError('Failed to fetch roles');
        }
    };

    const fetchPermissions = async () => {
        try {
            const response = await axios.get('/permissions');
            setPermissions(response.data);
        } catch (err) {
            setError('Failed to fetch permissions');
        }
    };

    const handleRoleSubmit = async (e) => {
        e.preventDefault();
        try {
            const response = await axios.post('/roles', { name: roleName });
            setRoles([...roles, response.data.role]);
            setRoleName('');
        } catch (err) {
            setError('Failed to create role');
        }
    };

    const handlePermissionChange = (e) => {
        const { value, checked } = e.target;
        if (checked) {
            setSelectedPermissions([...selectedPermissions, value]);
        } else {
            setSelectedPermissions(selectedPermissions.filter((perm) => perm !== value));
        }
    };

    const handleAssignPermissions = async (roleId) => {
        try {
            await axios.post(`/roles/${roleId}/permissions`, { permissions: selectedPermissions });
            setSelectedPermissions([]);
        } catch (err) {
            setError('Failed to assign permissions');
        }
    };

    return (
        <div>
            <h2>Role Management</h2>
            {error && <p>{error}</p>}
            <form onSubmit={handleRoleSubmit}>
                <div>
                    <label>Role Name:</label>
                    <input
                        type="text"
                        value={roleName}
                        onChange={(e) => setRoleName(e.target.value)}
                        required
                    />
                </div>
                <button type="submit">Create Role</button>
            </form>
            <h3>Roles</h3>
            <ul>
                {roles.map((role) => (
                    <li key={role.id}>
                        {role.name}
                        <div>
                            <h4>Assign Permissions</h4>
                            {permissions.map((perm) => (
                                <div key={perm.id}>
                                    <label>
                                        <input
                                            type="checkbox"
                                            value={perm.name}
                                            onChange={handlePermissionChange}
                                        />
                                        {perm.name}
                                    </label>
                                </div>
                            ))}
                            <button onClick={() => handleAssignPermissions(role.id)}>Assign</button>
                        </div>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default RoleManagement;
