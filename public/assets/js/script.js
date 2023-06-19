const charts = document.querySelectorAll(".chart");
let navlinkks= document.querySelector("#nav2");
const navlinks= navlinkks.querySelectorAll(".nav-link");
const activepagee= window.location.pathname;
const printBtns = document.querySelectorAll("#print");
// for (let i = 0; i < rows.length; i++) {
//   rows[i].style.width = rowWidths[i] + "px";
// }


charts.forEach(function (chart) {
  var ctx = chart.getContext("2d");
  var myChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
      datasets: [
        {
          label: "# of Votes",
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
});

$(document).ready(function () {
  $(".data-table").each(function (_, table) {
    $(table).DataTable();
  });

  //  print the receipt
  printBtns.forEach(printBtn =>{
    printBtn.addEventListener("click", function () {
      window.print();
    });
  });
  



  navlinks.forEach(navlink =>{
    if(navlink.href.includes(`${activepagee}`)){
      
      if(!navlink.href.includes("#")){   //
        navlink.classList.forEach(classlink =>
        {
          // console.log(navlin)
          if(classlink.includes("rounded"))
          {
            // console.log('ok');
            let parentid = navlink.parentElement.parentElement.parentElement.getAttribute('id');
            // console.log(parentid)
            navlinks.forEach(nalinnk=>
            {
              if(nalinnk.href.includes(parentid))
              {
                nalinnk.click();
               //console.log(nalinnk.href)
              }
            });
          }
           navlink.classList.add('navact');
        });
      }
    }
    // navlinkk.addEventListener('click',function(){
    //   document.querySelector('.navact')?.classList.remove('navact');
    //   navlinkk.classList.add('navact');
    // });
  });
});
