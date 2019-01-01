var el = 2
function createTag() {
	var parent = document.getElementById("more-tags-yay")
	var tag = document.createElement("label")
	var e = document.createElement("div")
	var input = document.createElement("input")
	var del = document.createElement("a")
	e.className = "pure-control-group"
	e.id = el
	tag.setAttribute("for","tags")
	tag.innerHTML = " "
	input.id = el + "input"
	input.type = "text"
	input.placeholder = "Enter another tag"
	input.className = "tagInput"
	del.href = "javascript:deleteTag('" + el + "')"
	del.innerHTML = "Remove"
	del.style.marginLeft = "4px"
	e.appendChild(tag)
	e.appendChild(input)
	e.appendChild(del)
	parent.appendChild(e)

	el = el + 1
}

function deleteTag (elt) {
   var e = document.getElementById(elt)
   e.parentNode.removeChild(e);
}

function repeatIt() {
	getResults()
}

function repeatIt1() {
	exportResults()
}

var elC = 1
var tags = []
function getResults() {
	
	if(document.getElementById(elC + 'input')!==null) {
	// It does exist
	var elCi = elC + "input"
	var eI = document.getElementById(elCi).value
	console.log(eI)
	console.log(elCi)
	elC = elC + 1
	tags.push(eI)
	repeatIt()
	
	} else {
	// it does not exist
	console.log(tags)
	}
}

var ary = 0

function exportResults() {
	var els = document.getElementById("dumpingGround")
	if(tags.length > ary){
	els.innerHTML = els.innerHTML + tags[ary] + "\n"
	console.log(tags[ary])
	console.log(ary)
	ary = ary + 1
	repeatIt1()} else {console.log("done")}
}
function getFile() {
	var str = document.getElementById("fileToUpload").value;
	str = str.replace("C:\\fakepath\\", "");
	str = str.replace(" ","%20")
	str = str.replace(" ","%20")
	str = str.replace(" ","%20")
	str = str.replace(" ","%20")
	str = str.replace(" ","%20")
	str = str.replace(" ","%20")
	str = str.replace(" ","%20")
	str = str.replace(" ","%20")
	document.getElementById("fileInfo").innerHTML = str
	var file = str
}

function prepare() {
	var els = document.getElementById("dumpingGround")
	var tagsS = tags.toString()
	var tagsNC = tagsS.replace(/,/g , " ");
	var tagsNC = tagsNC + " imageD"
	var file = document.getElementById("fileInfo").innerHTML
	var str = "<div class='" + tagsNC + "'><img src='uploads/" + file + "' class='imageI'></div>"
	document.getElementById("tagsF").value = str
}

function cleanup() {
	document.getElementById("tooltip").hidden = true
	document.getElementById("submit").disabled = false
}

function allFuncts() {
	getResults()
	exportResults()
	getFile()
	prepare()
	cleanup()
}

function showIdeas() {
	document.getElementById("tagsIdeas").hidden = false
}

document.getElementById('searchB').onkeydown = function(event) {
    if (event.keyCode == 13) {
        alert('5');
        document.getElementById('searchB').blur()
    }
}
