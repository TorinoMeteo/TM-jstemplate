function DatiStoria(type)
{
	this.type = type;
	this.RawFile = '';
	this.Path = '';
	this.RawData = getRawDataStoria;
    this.UpdateDiv = UpdateDivDataStoria;
}

function UpdateDivDataStoria(UsrReq) {
      $.ajax({
	    async: true,
        method: 'post',                   
        url : this.RawFile,  
        data: {'Req': UsrReq, 'Path': this.Path},              
        success: function (data)
		{
			document.getElementById(UsrReq).innerHTML= data;
		}
		});
   	}

function getRawDataStoria(UsrReq) {
	var Output
      $.ajax({
	    async: false,
        method: 'post',                   
        url : this.RawFile,  
        data: {'Req': UsrReq, 'Path': this.Path},              
        success: function (data)
		{
			if(data.indexOf('.')>0)
			{
			Output = parseFloat(data);
			}
			else
			{
			Output = parseInt(data);
			}
			}
		});
        return Output;
   	}
