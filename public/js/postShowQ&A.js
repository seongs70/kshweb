$(document).ready(function(e) {
    $('.container__comment > .editButton').click(function(){
	//클릭한 li의 인덱스 번호를 num변수에 저장
	//this : 클릭된 객체 li 가리킴
	   var num=$(this).index();
	$('.container__comment > .commentEditWrap').each(function(){
		//.content안의 div 객체의 인덱스 번호를 bunho변수에 저장
		var bunho=$(this).index();
        //alert(bunho)
		//만약 bunho와 num값이 같다면
		if(bunho==num+1){
			//모든 div 숨김
				$('.container__comment > .commentEditWrap').hide();
			//bunho에 해당하는 div 나타남
				$(this).show();	
			}
		});
	});
     $('.editShow > .commentCancle').click(function(){
	//클릭한 li의 인덱스 번호를 num변수에 저장
	//this : 클릭된 객체 li 가리킴
	   var num2=$(this).index();
        $('.container__comment > .commentEditWrap').hide();
     });
    $('.container__comment > .repliyWrite').click(function(){
	   var num3=$(this).index();
        $('.container__comment > .repliy').each(function(){
           var num4=$(this).index();
            if(num3+1==num4){
			     $('.container__comment > .repliy').hide();    
				$(this).show();	
			}
        });
    });  
    $('.repliy > .repliyCancle').click(function(){
	//클릭한 li의 인덱스 번호를 num변수에 저장
	//this : 클릭된 객체 li 가리킴
	   var num5=$(this).index();
        $('.container__comment > .repliy').hide();
     });   
});