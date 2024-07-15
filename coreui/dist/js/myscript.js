let addButton = document.querySelector('.btnAdd')
console.log(addButton)
addButton.onclick =addRow
let div_invoice=document.querySelector('.invoice')
let btnSubmit = document.querySelector('.btnSubmit')
btnSubmit.onclick=formSubmit

let subTotal1=document.querySelector('.subTotal')
subTotal1.onfocus=calculateSubTotal

let Total1=document.querySelector('.total')
Total1.onfocus=calculateTotal

let balance =document.querySelector('.balance')
// console.log(balance)
balance.onfocus = calculateBalance


function addRow()
{
    


    let div_row= document.createElement('div')
    console.log(div_row)
    div_row.classList.add('row')
    div_row.classList.add('m-3')

    let div_col1=document.createElement('div')
    div_col1.classList.add('col-md-3')
    let product=document.createElement('input')
    product.setAttribute('type','text')
    product.setAttribute('name','product[]')
    product.classList.add('form-control')
    product.classList.add('title')
    div_col1.appendChild(product)

    console.log(div_col1)

    let div_col2=document.createElement('div')
    div_col2.classList.add('col-md-2')
    let price=document.createElement('input')
    price.setAttribute('type','text')
    price.setAttribute('name','price[]')
    price.classList.add('form-control')
    price.classList.add('price')
    div_col2.appendChild(price)

    console.log(div_col2)

    let div_col3=document.createElement('div')
    div_col3.classList.add('col-md-2')
    let qty=document.createElement('input')
    qty.setAttribute('type','text')
    qty.setAttribute('name','qty[]')
    qty.classList.add('form-control')
    qty.classList.add('qty')
    div_col3.appendChild(qty)

    console.log(div_col3)

    let div_col4=document.createElement('div')
    div_col4.classList.add('col-md-2')
    let subTotal=document.createElement('input')
    subTotal.setAttribute('type','text')
    subTotal.setAttribute('name','subTotal[]')
    subTotal.classList.add('form-control')
    subTotal.classList.add('subTotal')
    div_col4.appendChild(subTotal)
    subTotal.onfocus=calculateSubTotal


    console.log(div_col4)

    let div_col5=document.createElement('div')
    div_col5.classList.add('col-md-2')
    let buttonDelete=document.createElement('button')
    buttonDelete.classList.add('btn')
    buttonDelete.classList.add('btn-danger')
    // buttonDelete.setAttribute('id','btnDelete')
    buttonDelete.classList.add('btnDelete')
    buttonDelete.onclick=deleteRow
    buttonDelete.innerHTML="X"
    
    div_col5.appendChild(buttonDelete)


    div_row.appendChild(div_col1)
    div_row.appendChild(div_col2)
    div_row.appendChild(div_col3)
    div_row.appendChild(div_col4)
    div_row.appendChild(div_col5)

    div_invoice.appendChild(div_row)

    let subTotal_elements = document.querySelectorAll('.subTotal')
    console.log(subTotal_elements)

}

function deleteRow(e)
{
    e.preventDefault()
    console.log(e.target.parentElement.parentElement)
    div_invoice.removeChild(e.target.parentElement.parentElement)

    let total_elements = document.querySelectorAll('.subTotal')
    // console.log(total_elements)
   let totals=0

    for(let index=0;index<total_elements.length;index++)
    {
        
        totals += parseInt(total_elements[index].value)

         let div_delete= e.target.parentElement.parentElement.parentElement
         let div1_delete =div_delete.nextElementSibling.children.nextElementSibling
         let div2_delete =div1_delete.firstElementChild.value
         div2_delete = totals
        
    }
}

function formSubmit(e)
{
    e.preventDefault()

    let price_elements = document.querySelectorAll('.price')
    // console.log(price_elements)
    let prices=[]

    let title_elements = document.querySelectorAll('.title')
    let titles=[]

    let qty_elements=document.querySelectorAll('.qty')
    let qtys=[]

    let customer=document.querySelector('.customer').value
    let date=document.querySelector('.date').value
    
    for(let index=0;index<price_elements.length;index++)
    {
        prices[index] = price_elements[index].value
        titles[index]=title_elements[index].value
        qtys[index]=qty_elements[index].value

    }
    console.log(prices)
    console.log(qtys)
    console.log(titles)

$.ajax({
    url:'add_invoice.php',
    method:'post',
    data:{price:prices,title:titles,qty:qtys,customer:customer,date:date},
    success:function(response){
        // alert(response)
        if(response == "success")
        {
            alert("added invoice to list")
            document.querySelector('#invoiceForm').reset()
        }
    }
  })

  
    
    

}

function calculateSubTotal(e)
{
    console.log(e.target)
    let div_qty=e.target.parentElement.previousElementSibling
    let qty=div_qty.firstElementChild.value

    let div_price=div_qty.previousElementSibling
    let price=div_price.firstElementChild.value

    console.log(`qty:${qty} ,price ${price}`)
    e.target.value=qty*price
}
function calculateTotal(e)
{
    console.log(e.target)
    let total_elements = document.querySelectorAll('.subTotal')
    console.log(total_elements)
   let totals=0

    for(let index=0;index<total_elements.length;index++)
    {
        
        totals += parseInt(total_elements[index].value)
        e.target.value = totals
    }
    // console.log(totals)
    // console.log(typeof totals)
}

function calculateBalance(e)
{
  console.log(e.target)
  let div_discount=e.target.parentElement.previousElementSibling
  let discount=div_discount.firstElementChild.value

  let div_total=div_discount.previousElementSibling
  let total=div_total.firstElementChild.value

  console.log(`discount:${discount} ,total:${total}`)
  e.target.value= total-((discount/100)*total)
}


