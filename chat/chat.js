window.onload=function(){
	var customer=prompt("请输入昵称");

	var messBox=document.getElementsByTagName("textarea")[0];
	var text=messBox.value;
	

	var showBox=document.getElementById("showMessage");
	if(window.XMLHttpRequest=="undefined")
	{
		window.XMLHttpRequest=function()
		{
			try{return new ActiveXObject('Msxml2.XMLHTTP.6.0')}
			catch(e1)
			{
				try{return new ActiveXObject('Msxml2.XMLHTTP.3.0')}
				catch(e)
				{
					throw new Error("XMLHttpRequest is not supported");
				}
			}
		}
	}
	
	sendMessage('chatSave.php',messBox,customer);
	showMessage('chat.php',showBox);
	


}
function sendMessage(url,mBox,cus)
{	
	mBox.onchange=function()
	{	var data={
			name:cus,
			value:mBox.value

		}
		var xml=new XMLHttpRequest();
		xml.open("post",url);

		xml.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		
		xml.send(postMessage(data));
		
		mBox.value="";
	
	}
}
function showMessage(url,box)
{	
	var xml=new XMLHttpRequest();
	xml.open("get",url,true);
	xml.onreadystatechange=function()
	{
		if(xml.readyState==4)
		{
			if(xml.status==200||xml.status==304)
			{	

				styleBox(box,xml.responseText);
			}
		}
	}
	xml.send(null);
}
function styleBox(elt,text)
{
	var eltM=document.createElement("div");
	var eltT=document.createTextNode(text);
	eltM.setAttribute('class','font');
	elt.appendChild(eltM);
	eltM.appendChild(eltT);

}
function postMessage(oValue)
{
	var dates=[];
	if(!oValue)return " ";
	for(var name in oValue)
	{	
		if(!oValue.hasOwnProperty(name))continue;
		if(typeof oValue[name]=='function')continue;
		name=encodeURIComponent(name);
		var value=oValue[name].toString();
		value=encodeURIComponent(value);
		var date=name+"="+value;
		
		dates.push(date);
		
	}
		console.log(dates);
	return dates.join('&');

}