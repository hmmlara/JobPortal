import constants from "@/constant";
import axios from "axios";


class ApiCalls{
    async get(endpoints){
        let response = await axios.get(constants.BASE_URL + endpoints)
                .then(response => response.data)

        return response;
    }
}

export default new ApiCalls();