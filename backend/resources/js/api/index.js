import axios from "axios";
import constants from '../constants/index.js';


class ApiCalls {

    async get(endpoint) {
        return await axios.get(constants.BASE_URL + endpoint,{
            headers: {
                'Access-Control-Allow-Origin' : '*',
                'Content-Type' : 'application/json',
            }
        })
            .then(response => response.data)
            .catch(error => console.log(error));
    }
    async getById(endpoint) {
        let response = await axios.get(constants.BASE_URL + endpoint)
            .then(response => response.data)
            .catch(error => console.log(error));

        return response;
    }
     post(endpoint, data) {
        return axios.post(constants.BASE_URL + endpoint, data, {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'multipart/form-data',
            }
        });
    }

    update(endpoint, data) {
        return axios.post(constants.BASE_URL + endpoint, data, {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'multipart/form-data',
            },
            params: {
                _method: 'put'
            }
        });
    }

    async delete(endpoint) {
        return await axios.delete(constants.BASE_URL + endpoint);
    }
}

export default new ApiCalls();
