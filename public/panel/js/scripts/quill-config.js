const toolbar = [
    ['bold', 'italic', 'underline', 'strike'],
    ['blockquote', 'code-block', 'link'],
    ['video', 'formula', 'image'],

    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'script': 'sub'}, { 'script': 'super' }],
    [{ 'indent': '-1'}, { 'indent': '+1' }],
    [{ 'direction': 'rtl' }],

    [{ 'size': ['small', false, 'large', 'huge'] }],
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    [{ 'color': [] }, { 'background': [] }],
    [{ 'font': [] }],
    [{ 'align': [] }],

    ['clean']
];

let quill = new Quill('#editor', {
    modules: {toolbar},
    theme: 'snow'
});

let form = document.getElementById('form-container');
form.onsubmit = function() {
    let body = document.querySelector('input[name=body]');
    body.value = JSON.stringify(quill.root.innerHTML.trim());
};
