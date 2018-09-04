
module.exports = {

	clearInputs:(dataObj)=>{
		let obj = dataObj
		for(let i in obj){
			obj[i] = ''
		}
	}

};