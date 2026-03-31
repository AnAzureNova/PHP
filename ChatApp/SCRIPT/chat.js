let since = 0;

setInterval(() => {
    fetch('poll.php?since=' + since)
        .then(r => r.json())
        .then(msgs => msgs.forEach(m => {
            since = Math.max(since, m.ts);
            const time = new Date(m.ts * 1000).toLocaleTimeString();
            document.getElementById('chat').innerHTML += 
                '<p><b>' + m.name + '</b> [' + time + '] ' + m.text + '</p>';
        }));
}, 2500);

document.getElementById('sendBtn').onclick = () => {
    const msg = document.getElementById('messageInput').value;
    fetch('index.php', { method: 'POST', body: new URLSearchParams({ message: msg }) });
    document.getElementById('messageInput').value = '';
};