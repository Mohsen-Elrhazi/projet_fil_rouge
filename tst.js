let arr=[1,2,3,4,5,6,7,8,9,10];
let premier=[];
for(let i=2;i<=arr.length-1;i++){
    if(arr[i]%2!=0){
premier.push(arr[i])
    }
}

console.log(premier)