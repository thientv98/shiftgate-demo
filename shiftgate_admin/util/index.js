
function camel (str) {
    const camel = (str || '').replace(/-([^-])/g, g => g[1].toUpperCase());

    return capitalize(camel);
}

function camelActual (str) {
    return (str || '').replace(/-(\w)/g, (_, c) => (c ? c.toUpperCase() : ''));
}

function capitalize (str) {
    str = str || '';
    return `${str.substr(0, 1).toUpperCase()}${str.slice(1)}`;
}

function findProduct (store, id) {
    return store.state.store.products.find(p => p.id === id);
}

function isOnSale (variants) {
    return variants.some(variant => {
        return parseFloat(variant.price) < parseFloat(variant.compareAtPrice);
    });
}

function randomNumber (min, max) {
    return Math.floor(Math.random() * max) + min;
}

function randomString (length = 5) {
    let text = '';
    const possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    for (let i = 0; i < length; i++) {
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    }

    return text;
}

function replaceHyphen (s) {
    return s.replace('-', '_');
}

function paddy(num, len, char) {
    let pad = new Array(1 + len).join('0');
    return char + (pad + num).slice(-pad.length);
}

function download(data, strFileName, strMimeType) {
	
	var self = window, // this script is only for browsers anyway...
		u = "application/octet-stream", // this default mime also triggers iframe downloads
		m = strMimeType || u, 
		x = data,
		D = document,
		a = D.createElement("a"),
		z = function(a){return String(a);},
		
		
		B = self.Blob || self.MozBlob || self.WebKitBlob || z,
		BB = self.MSBlobBuilder || self.WebKitBlobBuilder || self.BlobBuilder,
		fn = strFileName || "download",
		blob, 
		b,
		ua,
		fr;
	
	if(String(this)==="true"){ //reverse arguments, allowing download.bind(true, "text/xml", "export.xml") to act as a callback
		x=[x, m];
		m=x[0];
		x=x[1]; 
	}	
	
	//go ahead and download dataURLs right away
	if(String(x).match(/^data\:[\w+\-]+\/[\w+\-]+[,;]/)){
		return navigator.msSaveBlob ?  // IE10 can't do a[download], only Blobs:
			navigator.msSaveBlob(d2b(x), fn) : 
			saver(x) ; // everyone else can save dataURLs un-processed
	}//end if dataURL passed?
	
	try{	
		blob = x instanceof B ? 
			x : 
			new B([x], {type: m}) ;
	}catch(y){
		if(BB){
			b = new BB();
			b.append([x]);
			blob = b.getBlob(m); // the blob
		}
		
	}	
	
	function d2b(u) {
		var p= u.split(/[:;,]/),
		t= p[1],
		dec= p[2] == "base64" ? atob : decodeURIComponent,
		bin= dec(p.pop()),
		mx= bin.length,
		i= 0,
		uia= new Uint8Array(mx);

		for(i;i<mx;++i) uia[i]= bin.charCodeAt(i);

		return new B([uia], {type: t});
	 }
	  
	function saver(url, winMode){		
		if ('download' in a) { //html5 A[download] 			
			a.href = url;
			a.setAttribute("download", fn);
			a.innerHTML = "downloading...";
			D.body.appendChild(a);
			setTimeout(function() {
				a.click();
				D.body.removeChild(a);
				if(winMode===true){setTimeout(function(){ self.URL.revokeObjectURL(a.href);}, 250 );}
			}, 66);
			return true;
		}
		
		//do iframe dataURL download (old ch+FF):
		var f = D.createElement("iframe");
		D.body.appendChild(f);
		if(!winMode){ // force a mime that will download:
			url="data:"+url.replace(/^data:([\w\/\-\+]+)/, u);
		}		 
	
		f.src = url;
		setTimeout(function(){ D.body.removeChild(f); }, 333);
		
	}//end saver 		

	if (navigator.msSaveBlob) { // IE10+ : (has Blob, but not a[download] or URL)
		return navigator.msSaveBlob(blob, fn);
	} 	
	
	if(self.URL){ // simple fast and modern way using Blob and URL:
		saver(self.URL.createObjectURL(blob), true);
	}else{
		// handle non-Blob()+non-URL browsers:
		if(typeof blob === "string" || blob.constructor===z ){
			try{
				return saver( "data:" +  m   + ";base64,"  +  self.btoa(blob)  ); 
			}catch(y){
				return saver( "data:" +  m   + "," + encodeURIComponent(blob)  ); 
			}
		}
		
		// Blob but not URL:
		fr=new FileReader();
		fr.onload=function(e){
			saver(this.result); 
		};
		fr.readAsDataURL(blob);
	}	
	return true;
}

const isExist = (roles, permissions) => { 
    for (let i in roles) {
        if(permissions.indexOf(roles[i]) != -1) return true;
    }
    return false;
};

const randomElement = (arr = []) => {
    return arr[Math.floor(Math.random() * arr.length)];
};
  
const kebab =  (str) => {
    return (str || '').replace(/([a-z])([A-Z])/g, '$1-$2').toLowerCase();
};
  
const toggleFullScreen = () => {
    let doc = window.document;
    let docEl = doc.documentElement;

    console.log(doc);

    let requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
    let cancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;

    if (!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) {
        requestFullScreen.call(docEl);
    }
    else {
        cancelFullScreen.call(doc);
    }
};
  
// const toggleSearch = () => {
//     let doc = window.document;
//     let toggle = doc.getElementsByClassName('sh-toggle')[0];
//     let search = toggle.getElementsByClassName('sh-search')[0];
//     let minus = toggle.getElementsByClassName('mdi-minus').length;
//     let plus = toggle.getElementsByClassName('mdi-plus').length;
//     let icon = toggle.getElementsByClassName('sh-icon')[0];

//     if(minus > 0) {
//         search.classList.remove('search-show');
//         search.className += " search-hidden";        
//         icon.classList.remove('mdi-minus');
//         icon.className += " mdi-plus";
//     } else if(plus > 0) {
//         search.classList.remove('search-hidden');
//         search.className += " search-show";
//         icon.classList.remove('mdi-plus');
//         icon.className += " mdi-minus";
//     }
// };

const serializeObj = (obj) => {
    var str = [];
    for (var p in obj){
        if (obj.hasOwnProperty(p)) {
            str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        }
    }
    return str.join("&");
};

const isEmptyObject = (obj) => {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
};


  
export default {
    randomElement,
    toggleFullScreen,
    kebab,
    camel,
    camelActual,
    findProduct,
    isOnSale,
    randomNumber,
    randomString,
    serializeObj,
    isEmptyObject,
    isExist,
    replaceHyphen,
    paddy,
    // toggleSearch,
    download,
};