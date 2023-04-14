import axios from 'axios'

async function getPosts(){
    try{
        const response = await axios.get("/api/posts");
        return response.data;
    }
    catch(error){
        console.log(error);
    }
}

async function getPostByid(id){
    try{
        const response = await axios.get("/api/posts/"+id);
        return response.data;
    }
    catch(error){
        console.log(error);
    }
}

async function addtofavorie(post_id,user_id){
    try{
        const response = await axios.post("/api/favories/",{
            user_id:user_id,
            post_id:post_id
        });
        return response.data;
    }
    catch(error){
        console.log(error);
    }
}


export {getPosts,getPostByid,addtofavorie}