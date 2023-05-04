import axios from "axios";
import constants from '../constants/index.js';


class ApiCalls {

    async get(endpoint) {
        let response = await axios.get(constants.BASE_URL + endpoint)
            .then(response => response.data)
            .catch(error => error.data);

        return response;
    }
    async getById(endpoint) {
        let response = await axios.get(constants.BASE_URL + endpoint)
            .then(response => response.data)
            .catch(error => console.log(error));

        return response;
    }
    post(endpoint, data) {
        axios.post(constants.BASE_URL + endpoint, data, {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'multipart/form-data',
            }
        })
            .then(response => console.log(response.data))
            .catch(error => console.log(error.data));
    }

    update(endpoint, data) {
        axios.post(constants.BASE_URL + endpoint, data, {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'multipart/form-data',
            },
            params: {
                _method: 'put'
            }
        })
            .then(response => console.log(response.data))
            .catch(error => console.log(error.data));
    }

    delete(endpoint) {
        axios.delete(constants.BASE_URL + endpoint)
            .then(response => console.log(response))
            .catch(error => console.log(error));
    }
}

export default new ApiCalls();
