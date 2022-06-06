const form = document.querySelector("form");
const inputPrimeira = form.querySelector("#primeira");
const inputSegunda = form.querySelector("#segunda");
const inputMedia = form.querySelector("#media");
const inputSituacao = form.querySelector("#situacao");

let primeira, segunda, media, situacao;
const atualizaMedia = (primeira, segunda) => (primeira+segunda) / 2;
const atualizaSituacao = media => media>=7?'aprovado':'reprovado';

inputPrimeira.addEventListener("input", function(){
    primeira = parseFloat(this.value);
    media = atualizaMedia(primeira, parseFloat(inputSegunda.value));
    inputMedia.value = media.toFixed(1);
    inputSituacao.value = atualizaSituacao(media);
});

inputSegunda.addEventListener("input", function(){
    segunda = parseFloat(this.value);    
    media = atualizaMedia(parseFloat(inputPrimeira.value), segunda);
    inputMedia.value = media.toFixed(1);
    inputSituacao.value = atualizaSituacao(media);
});