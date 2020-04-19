 let myscroll= document.querySelector("#scroll");;

 myscroll.addEventListener('click',function (e) { 
      window.scrollTo({top:20,behavior:'smooth'})
  });

window.addEventListener("scroll", function (e) {  
     let scrollPosition = document.documentElement.scrollTop;

     if (scrollPosition>20) {
          document.getElementById("scroll").style.display='block'
     } else {
          document.getElementById("scroll").style.display='none'
     }
     
})


//content loaded

window.addEventListener('DOMContentLoaded',function (e) {
           
     fetch('https://api.covid19api.com/summary')
     .then(res=>res.json())
     .then((data) => {
let tbody=document.getElementById('tbody')
let output='';
          for (let i = 1; i < data['Countries'].length; i++) {
               //   console.log(data['Countries'][i].Country);
                
                output+=` 
                <tr>
                             <td> ${ data['Countries'][i].Country} </td>
                            <td> ${ data['Countries'][i].NewConfirmed} </td>
                            <td> ${ data['Countries'][i].TotalConfirmed} </td>
                            <td> ${ data['Countries'][i].TotalDeaths} </td>
                            <td> ${ data['Countries'][i].NewDeaths} </td> 
                            <td> ${ data['Countries'][i].NewRecovered} </td>
                            <td> ${ data['Countries'][i].TotalRecovered} </td>    
                </td>`
                 
          }

          tbody.innerHTML=output;
          
     }).catch((err) => {
          console.log(err);
     });
     
  })