const filter=document.querySelector('#filter');
const min_salary=document.querySelector('#min_salary');
const max_salary=document.querySelector('#max_salary');

// $(document).on('click','#filter',function(){

//     let btn=document.querySelector('#filter');
//     let parent=btn.parentElement.parentElement
//     let id=parent.getAttribute('id')
//     $.ajax({
//         method:'post',
//         url:'verify.php',
//         data:{id:id},
//         success:function(response)
//         {
//             if(response=="success")
//             alert("verification is successful")
//         else
//         alert("fail to verify .try again")
//         }
//     })
    
// })

// document.addEventListener('click',function(){
   
// })

// filter.addEventListener('click',function(event){
//     event.preventDefault();
//     let min_value=min_salary.value
//     let max_value=max_salary.value
//     console.log(min_value)
//     $.ajax({
//         method:'post',
//         url:'filter.php',
//         data:{min:min_value,max_value},
//         success:function(response)
//         {
            
//             let tbody=$("#data_body")
//             tbody.empty().append(response);
//         }
//     })
// })