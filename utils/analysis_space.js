let allDescriptions= document.querySelectorAll('.analysis-space');

allDescriptions.forEach ( (description,indexDescription) => {
  const descriptionArr= description.innerText.split('');
  let haveSpace=false;
  descriptionArr.forEach((letter,indexLetter)=>{
    if(letter==" "){
      haveSpace=true;
    }
  })
  if(!haveSpace){
    console.log('no have spaces')
    let i=0;
    while(i<descriptionArr.length-1){
      if(i != 0){
        descriptionArr[i]=  " "+descriptionArr[i];
      }
      i+=10;
    }
    description.innerHTML= descriptionArr.join().replace(/,/g,'');  
  }
});