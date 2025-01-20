<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="shortcut icon" href="statics/imgs/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js"></script>
    <script src="statics/js/jquery.js"></script>
</head>

<style>
:root{
    --color-1: blue;
    --color-2: red;
    --color-3: green;
    --color-4: white;
}
*{
    border: 0;
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
a{
    color: unset;
}
body{
    font-family: sans-serif;
    font-size: 14px;
}
.container{
    padding: 0 15px;
}
.brand{
    font-weight: bold;
    color: var(--color-4);
}
.list{
    list-style: none;
}
.list li{
    cursor: pointer;
}
.dropdwon{
    position: relative;
}
.dropdwon .toggler{
    font-weight: bold;
    color: var(--color-4);
    cursor: pointer;
}
.dropdwon .list{
    position: absolute;
    right: 0px;
    top: 35px;
    padding: 4px;
    background-color: blue;
    color: var(--color-4);
    display: none;
}
.d-flex-b{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
/* endglobal */
.table_content{
    min-height: 81.3vh;
}
.header{
    margin-top: 20px;
    /* background-color: azure; */
}
.records{
    margin-top: 20px;
    display: grid;
    grid-template-columns: repeat(auto-fill,minmax(200px,auto));
    gap: 10px;
}
.record{
    background-color: dimgrey;
    text-align: center;
    font-weight: bold;
}
.record .key{
    color: burlywood;
}
.record .value{
    color: white;
}
.record .actions .edit{
    background-color: blue;
    width: 100%;
}
.record .actions .delete{
    background-color: red;
    width: 100%;
}
.navbar{
    background-color: var(--color-1);
    height: 50px;
}
.btn{
    padding: 8px 20px;
    background-color: green;
    color: white;
    cursor: pointer;
}
.modal{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.modal .content{
    padding: 4px;
    background-color: white;
    min-width: 400px;
    max-height: 80vh;
    overflow: auto;
    z-index: 1;
}
.overlay{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: black;
    opacity: .5;
}
.modal-box{
    display: none;
}
.close{
    display: block;
    background-color: red;
    color: white;
    width: fit-content;
    padding: 4px;
    border-radius: 4px;
    margin-left: auto;
    cursor: pointer;
    font-weight: bold;
}
.form{
    margin-top: 10px;
}
.form input,.form button{
    display: block;
    block-size: 30px;
    width: 100%;
    border: 1px solid gray;
    padding: 0 8px;
    margin-bottom: 5px;
}
.result{
    background-color: blue;
    color: white;
    padding: 15px;
    font-weight: bold;
    text-align: center;
    display: none;
}
footer{
    background-color: var(--color-1);
    text-align: center;
    padding: 8px 0;
    color: white;
}
.sochial{
    margin-top: 20px;
    font-size: 20px;
}
.sochial a{
    transition: color .4s;
}
.sochial a:hover{
    color: darkblue;
}
</style>

<body>
