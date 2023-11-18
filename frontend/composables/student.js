import axios from "axios";
const useStudent = () =>{
    const students = ref([]);
    const student = ref({});
    const errors = ref({});

    const baseURL = 'http://127.0.0.1:8000/api';

    const getStudents = async() =>{
        try{
            const response = await axios.get(baseURL+'/getStudents');
            students.value = response.data;
        }catch(err){
            console.log(err);
        }
    }

    const storeStudents = async(data) => {
        try{
            axios.post(baseURL+'/createStudents', data);
        }catch(err){
            console.log(err);
        }
    }

    return{
        students,
        getStudents,
        storeStudents,
    }
}

export default useStudent;