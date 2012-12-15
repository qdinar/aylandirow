//alert('ok');
function dgebi(temp_s){
	return document.getElementById(temp_s);
}
function httpsoraw(){
	var xhr = false;
	try{
		xhr=new XMLHttpRequest();
	}catch(e){
		try{
			xhr=new ActiveXObject('Microsoft.XMLHTTP');
		}catch(e2){
			xhr=false;
		}
	}
	return xhr;
}
function escapeampersand(tmpstr){
	return tmpstr.replace(/^\s\s*/, '').replace(/\s\s*$/, '').replace(RegExp('&','g'), '%26');
}
if(window.getSelection){
	//alert('ok');
	taqdim=document.createElement('div');
	taqdim.style.position='fixed';
	taqdim.style.zIndex='32767';
	taqdim.style.top='250px';
	taqdim.style.left='100px';
	taqdim.style.background='#fff';
	taqdim.style.border='1px solid #eee';
	taqdim.style.direction='ltr';
	taqdim.style.textAlign='center';
	taqdim.style.width='500px';
	taqdim.style.cursor='pointer';
	yapqoc=document.createElement('span');
	yapqoc.style.border='1px solid #eee';
	yapqoc.style.cursor='pointer';
	yapqoc.style.padding='2px 5px';
	yapqoc.style.cssFloat='right';
	yapqoc.appendChild(document.createTextNode('X'));
	taqdim.appendChild(yapqoc);
	taqdim.appendChild(document.createTextNode('Соңгы сайланган текстка тәрҗемә тәкъдим итү'));
	document.body.appendChild(taqdim);
	//dgebi('taqdim').onclick=function oooalert(){
	/*taqdim.onclick=function oooalert(){
		if(window.savedselection==undefined){
			alert('Бернәрсә дә сайланмаган');
			return;
		}
		//alert(userSelection);
		//alert(window.savedselection);
		jibarow=httpsoraw();
		if(jibarow!==false){
			tarjima=prompt(window.savedselection+' га тәрҗемә тәкъдим ит:','');
			if(tarjima==''||tarjima==null){
				//alert('Бернәрсә дә кертмәдең');
				return;
			}
			tarjimataqdimi='yaponcaso='+escapeampersand(window.savedselection)+'&tatarcaso='+escapeampersand(tarjima);
			jibarow.open(
				"POST"
				,'/'
				,true
			);
			jibarow.setRequestHeader(
				'Content-Type'
				,'application/x-www-form-urlencoded'
			);
			jibarow.setRequestHeader('Content-Length',tarjimataqdimi.length);
			jibarow.setRequestHeader('Connection','close');
			jibarow.onreadystatechange=
				jibarowbara
			;
			jibarow.send(tarjimataqdimi);
		}
	}*/
	yapqoc.onclick=function(event){
		this.parentNode.style.visibility="hidden";
		event.stopPropagation();
	}
	taqdim.appendChild(document.createElement('br'));
	taqdim.appendChild(tmp=document.createElement('small'));
	tmp.appendChild(document.createTextNode('Киңәш: берничә иероглифтан торса, шуны башта җибәрегез, аннары составындагы иероглиф тәрҗемәләрен җибәрегез'));
	taqdim.appendChild(document.createElement('br'));
	taqdim.appendChild(document.createTextNode('казакча бер өлеш сүз (үзгәртелмәгәне): '));
	tmp=document.createElement('input')
	tmp.setAttribute('type','text');
	taqdim.appendChild(tmp);
	tmp.id="yaponca";
	taqdim.appendChild(document.createElement('br'));
	taqdim.appendChild(tmp=document.createElement('a'));
	tmp.appendChild(document.createTextNode('бу тулы битнең үзгәртелмәгәнен ачу'));
	tmp.target='_blank';
	tmp.href=dgebi('conadres').href;
	taqdim.appendChild(document.createElement('br'));
	tmp=document.createElement('input')
	tmp.setAttribute('type','text');
	taqdim.appendChild(tmp);
	tmp.id="tatarca";
	taqdim.appendChild(tmp=document.createElement('button'));
	tmp.appendChild(document.createTextNode('Тәрҗемә тәкъдим итү'));
	tmp.onclick=function(event){
		if(dgebi('yaponca').value==''||dgebi('tatarca').value==''){
			alert('Сүз кертелмәгән');
			return;
		}
		jibarow=httpsoraw();
		if(jibarow==false){
			return;
		}

		tarjimataqdimi='yaponcaso='+escapeampersand(dgebi('yaponca').value)+'&tatarcaso='+escapeampersand(dgebi('tatarca').value);
		jibarow.open(
			"POST"
			,'/'
			,true
		);
		jibarow.setRequestHeader(
			'Content-Type'
			,'application/x-www-form-urlencoded'
		);
		jibarow.setRequestHeader('Content-Length',tarjimataqdimi.length);
		jibarow.setRequestHeader('Connection','close');
		jibarow.onreadystatechange=
			jibarowbara
		;
		jibarow.send(tarjimataqdimi);

	}
	/*document.onmouseup=function ooo(){
		//alert('ok');
		var userSelection;
		if (window.getSelection) {
			userSelection = window.getSelection();
		}
		//else if (document.selection) { // should come last; Opera!
		//	userSelection = document.selection.createRange();
		//}
		//alert(userSelection);
		//window.savedselection=userSelection;
		//alert(window.savedselection);
		if(userSelection&&(userSelection!='')){
			//alert('ok');
			//alert(userSelection);
			//alert(userSelection.text);
			//if(userSelection.text){
				//alert('ok');
				//window.savedselection=userSelection.text+"";
				//alert(window.savedselection);
			//}else if(typeof userSelection.getExpression =='function'){
			//	window.savedselection=userSelection.getExpression('text');
			//}else{
				//window.savedselection=userSelection.toString();
				window.savedselection=userSelection+"";
				//alert('ok');
			//}
			//window.savedselection=userSelection+"";
			//alert(window.savedselection);
			//window.savedselection=userSelection;
			//window.savedselection+='ok';
		}
	}*/
	function jibarowbara(){
		if(jibarow.readyState==4){
			if(jibarow.status==200){
				jawap=jibarow.responseText;
				alert(jawap);
			}
			delete(jibarow);
		}
	}
}
/*if(!window.getSelection){
	dgebi('ooo').style.visibility='hidden';
}*/
//dgebi('ooo').onclick=function oooalert(){

