

const fetchCatgeoriesUrl="http://localhost/panady/api/category/fetch-category.php";
const addCategoryUrl="http://localhost/panady/api/category/add-category.php";
const deleteCategoryUrl="http://localhost/panady/api/category/delete-category.php";
const updateCategoryUrl="http://localhost/panady/api/update-category.php";
const getCategoryUrl="http://localhost/panady/api/get-category.php";


const AllCategoriesData=async ()=>{

    try{
        const response=await fetch(fetchCatgeoriesUrl);
        const data=await response.json();
        return catagorieResults(data);
    }catch(err){
        console.log(err);
    }
}
const catagorieResults=(data)=>{

         return  data.map((item)=>{
              /*const tr=document.createElement('tr');
              tr.innerHTML=`
                  <td>${item.id}</td>
                  <td>${item.category_name}</td>
                  <td>
                      <button class="btn btn-sm btn-info" onclick="editCategory(${item.id})">Edit</button>
                      <button class="btn btn-sm btn-danger" onclick="deleteCategory(${item.id})">Delete</button>
                  </td>
              `;*/
                return `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.category_name.toUpperCase()}</td>
                        <td>
                            <button class="btn btn-sm btn-info editCategory"" data-toggle="modal" data-target="#editCategoryModal" id="${item.id}" >Edit</button>
                        
                        </td>
                    </tr>
                `;
         }).join('');
              
}

const categoryOption=(data)=>{
    return data.map((item)=>{
         return `<option value="${item.id}">${item.category_name.toUpperCase()}</option>`
    }).join('')
}
//res
const addCategory=async (datas)=>{
      //console.log(datas,typeof(datas))
      const response=await fetch("http://localhost/panady/api/category/add-category.php",{
          method:"POST",
          headers:{"Content-Type":"application/json",'Accept':'application/json'},
          body:datas 
      });
        const data=await response.json(); 
        return data
}


const deleteCategory=async (id)=>{
      const response=await fetch(deleteCategoryUrl,{
          method:"POST",
          headers:{"Content-Type":"application/json"},
          body:JSON.stringify({id})
      });
        const data=await response.json(); 
        location.reload();
}

const editCategory=async (id)=>{
      const response=await fetch(getCategoryUrl,{
          method:"POST",
          headers:{"Content-Type":"application/json"},
          body:JSON.stringify({id})
      });
        const data=await response.json(); 
        /*document.getElementById('category_name').value=data.category_name;
        document.getElementById('category_id').value=data.id;
        document.getElementById('addCategoryBtn').style.display="none";
        document.getElementById('updateCategoryBtn').style.display="block";*/
}


export {AllCategoriesData,catagorieResults,addCategory,categoryOption,deleteCategory,editCategory,updateCategoryUrl};
