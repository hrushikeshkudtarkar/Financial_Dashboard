fetch('fetch_data.php')

.then(response => response.json())

.then(data => {

/* LINE CHART */

const financeChart =
document.getElementById('financeChart');

new Chart(financeChart, {

type:'line',

data:{

labels:data.months,

datasets:[

{
label:'Revenue',

data:data.revenues,

borderColor:'#3b82f6',

backgroundColor:'rgba(59,130,246,0.2)',

fill:true,

tension:0.4
},

{
label:'Expenses',

data:data.expenses,

borderColor:'#ef4444',

backgroundColor:'rgba(239,68,68,0.2)',

fill:true,

tension:0.4
}

]

},

options:{

responsive:true,

maintainAspectRatio:false

}

});

/* DOUGHNUT CHART */

const departmentChart =
document.getElementById('departmentChart');

new Chart(departmentChart, {

type:'doughnut',

data:{

labels:data.departments,

datasets:[{

data:data.departmentRevenue,

backgroundColor:[

'#3b82f6',
'#ef4444',
'#10b981',
'#f59e0b'

]

}]

},

options:{

responsive:true,

maintainAspectRatio:false

}

});

});