let btnCard = document.querySelector('.btnCard')
// console.log(btnCard)
btnCard.onclick=formCard


function formCard(e)
{
    e.preventDefault()
    console.log(e.target)

//     let price_elements = document.querySelectorAll('.price')
//     // console.log(price_elements)
//     let prices=[]

//     let title_elements = document.querySelectorAll('.title')
//     let titles=[]

//     let qty_elements=document.querySelectorAll('.qty')
//     let qtys=[]

//     let customer=document.querySelector('.customer').value
//     let date=document.querySelector('.date').value
    
//     for(let index=0;index<price_elements.length;index++)
//     {
//         prices[index] = price_elements[index].value
//         titles[index]=title_elements[index].value
//         qtys[index]=qty_elements[index].value

//     }
//     console.log(prices)
//     console.log(qtys)
//     console.log(titles)

// $.ajax({
//     url:'add_invoice.php',
//     method:'post',
//     data:{price:prices,title:titles,qty:qtys,customer:customer,date:date},
//     success:function(response){
//         // alert(response)
//         if(response == "success")
//         {
//             alert("added invoice to list")
//             document.querySelector('#invoiceForm').reset()
//         }
//     }
//   })

  
    
    

}