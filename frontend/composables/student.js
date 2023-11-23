import axios from "axios";

const useStudent = () =>{
    const students = ref([]);
    const student = ref({});
    const errors = ref({});

    const baseURL = 'http://127.0.0.1:8000/api';

    const getStudents = async() => {
        try{
            const response = await axios.get(baseURL+'/getStudents');
            students.value = response.data;
        }catch(err){
                errors.value = err.response.data;
        }
    }

    const storeStudents = async(data) => {
        try{
            await axios.post(baseURL+'/createStudents', data);
        }catch(err){
            errors.value = err.response.data;
        }
    }
    return{
        students,
        getStudents,
        storeStudents,
        errors
    }
}

export default useStudent;