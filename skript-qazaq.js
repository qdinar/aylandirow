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
	//return tmpstr.toLowerCase().replace(/^\s\s*/, '').replace(/\s\s*$/, '').replace(RegExp('&','g'), '%26');
	return tmpstr.toLowerCase().replace(RegExp('&','g'), '%26');
}
if(window.getSelection){
	//alert('ok');
	taqdim=document.createElement('div');
	yapqoc=document.createElement('span');
	yapqoc.style.border='1px solid #eee';
	yapqoc.style.cursor='pointer';
	yapqoc.style.padding='2px 5px';
	yapqoc.style.cssFloat='right';
	yapqoc.appendChild(document.createTextNode('X'));
	taqdim.appendChild(yapqoc);
	taqdim.style.position='fixed';
	taqdim.style.zIndex='32767';
	taqdim.style.top='200px';
	taqdim.style.left='100px';
	taqdim.style.background='#fff';
	taqdim.style.border='1px solid #eee';
	taqdim.style.direction='ltr';
	taqdim.style.textAlign='center';
	taqdim.style.width='600px';
	//taqdim.style.cursor='pointer';
	taqdim.appendChild(document.createTextNode('казакча бер өлеш сүз (үзгәртелмәгәне): '));
	tmp=document.createElement('input')
	tmp.setAttribute('type','text');
	taqdim.appendChild(tmp);
	tmp.id="qazaqca";
	taqdim.appendChild(document.createElement('br'));
	taqdim.appendChild(tmp=document.createElement('a'));
	tmp.appendChild(document.createTextNode('бу тулы битнең үзгәртелмәгәнен ачу'));
	tmp.target='_blank';
	tmp.href=dgebi('conadres').href;
	taqdim.appendChild(document.createElement('br'));
	taqdim.appendChild(tmp=document.createElement('button'));
	tmp.appendChild(document.createTextNode('ул сүзне үзгәртәсе түгеллеген хәбәр итү, мәсьәлән, "математика"ны'));
	tmp.onclick=function(event){
		if(dgebi('qazaqca').value==''){
			alert('Сүз кертелмәгән');
			return;
		}
		jibarow=httpsoraw();
		if(jibarow==false){
			return;
		}

		tarjimataqdimi='uzgartasitugilqazaqca='+escapeampersand(dgebi('qazaqca').value);
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
	document.body.appendChild(taqdim);
	taqdim.appendChild(document.createElement('br'));
	taqdim.appendChild(document.createTextNode('шул сүзнең татарчасы: '));
	tmp=document.createElement('input')
	tmp.setAttribute('type','text');
	taqdim.appendChild(tmp);
	tmp.id="tatarca";
	taqdim.appendChild(tmp=document.createElement('button'));
	tmp.appendChild(document.createTextNode('Тәрҗемә тәкъдим итү'));
	tmp.onclick=function(event){
		if(dgebi('qazaqca').value==''||dgebi('tatarca').value==''){
			alert('Сүз кертелмәгән');
			return;
		}
		jibarow=httpsoraw();
		if(jibarow==false){
			return;
		}

		tarjimataqdimi='qazaqcaso='+escapeampersand(dgebi('qazaqca').value)+'&tatarcaso='+escapeampersand(dgebi('tatarca').value);
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
	/*taqdim.appendChild(document.createElement('br'));
	taqdim.appendChild(tmp=document.createElement('button'));
	tmp.appendChild(document.createTextNode('соңгы сайланганны копияләү (аны төзәтәсе буладыр)'));
	tmp.onclick=function(event){
		if(window.savedselection!=undefined){
			dgebi('qazaqca').value=window.savedselection;
		}
	}*/
	//taqdim.appendChild(document.createElement('br'));
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
			tarjimataqdimi='yaponcaso='+window.savedselection+'&tatarcaso='+tarjima;
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
	//taqdim.appendChild(document.createElement('br'));
	//taqdim.appendChild(tmp=document.createElement('small'));
	//tmp.appendChild(document.createTextNode('Киңәш: берничә иероглифтан торса, шуны башта җибәрегез, аннары составындагы иероглиф тәрҗемәләрен җибәрегез'));
	/*document.onmouseup=function ooo(){
		//alert('ok');
		var userSelection;
		//if (window.getSelection) {
		userSelection = window.getSelection();
		//}
		if(userSelection&&(userSelection!='')){
			window.savedselection=userSelection.toString();
			//window.savedselection=userSelection+"";
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

