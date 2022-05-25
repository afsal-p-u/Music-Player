const music =  new Audio('vande.mp3');

const songs = [
    {
        id:'1',
        songName:` Dandelions <br>
        <div class="subtitle">Ruth B.</div>`,
        poster: 'img/1.webp'
    },
    {
        id:'2',
        songName:` Attention<br>
        <div class="subtitle">Charlie Puth</div>`,
        poster: 'img/2.webp'
    },
    {
        id:'3',
        songName:` Night Changes<br>
        <div class="subtitle">Onedirection</div>`,
        poster: 'img/3.webp'
    },
    {
        id:'4',
        songName:` Heat Waves<br>
        <div class="subtitle">Glass Animal</div>`,
        poster: 'img/4.webp'
    },
    {
        id:'5',
        songName:` As It Was<br>
        <div class="subtitle">Harry Styles</div>`,
        poster: 'img/5.webp'
    },
    {
        id:'6',
        songName:` Darkside<br>
        <div class="subtitle">Alan Walker</div>`,
        poster: 'img/6.webp'
    },
    {
        id:'7',
        songName:` Infinity<br>
        <div class="subtitle">Jaymes Young</div>`,
        poster: 'img/7.webp'
    },
    {
        id:'8',
        songName:` Hymn for The Weekend<br>
        <div class="subtitle">Coldplay</div>`,
        poster: 'img/8.webp'
    },
    {
        id:'9',
        songName:` Without Me<br>
        <div class="subtitle">Halsey</div>`,
        poster: 'img/9.webp'
    },
    {
        id:'10',
        songName:` We Don't Talk Anymore<br>
        <div class="subtitle">Charlie Puth</div>`,
        poster: 'img/10.webp'
    },
    {
        id:'11',
        songName:` Middle of The Night<br>
        <div class="subtitle">Elley Duhe</div>`,
        poster: 'img/11.webp'
    },
    {
        id:'12',
        songName:` Starboy<br>
        <div class="subtitle">The Weeknd</div>`,
        poster: 'img/12.webp'
    },
    {
        id:'13',
        songName:` Lucid Dreams<br>
        <div class="subtitle">Juice Wrld</div>`,
        poster: 'img/13.webp'
    },
    {
        id:'14',
        songName:` Dusk Till Dawn<br>
        <div class="subtitle"> ZAYN</div>`,
        poster: 'img/14.webp'
    },
    {
        id:'15',
        songName:` Industry Baby<br>
        <div class="subtitle">Lil Nax X</div>`,
        poster: 'img/15.webp'
    },
    {
        id:'16',
        songName:` Sunflower<br>
        <div class="subtitle">Post Malone</div>`,
        poster: 'img/16.webp'
    },
    {
        id:'17',
        songName:` Sweet But Psycho<br>
        <div class="subtitle">Ava Max</div>`,
        poster: 'img/17.webp'
    },
]

Array.from(document.getElementsByClassName('songItem')).forEach((element, i)=>{
    element.getElementsByTagName('img')[0].src = songs[i].poster;
    element.getElementsByTagName('h5')[0].innerHTML = songs[i].songName;
})

let masterPlay = document.getElementById('masterPlay');
let wave = document.getElementsByClassName('wave')[0];

masterPlay.addEventListener('click', ()=>{
    if(music.paused || music.currentTime <=0){
        music.play();
        masterPlay.classList.remove('bi-play-fill');
        masterPlay.classList.add('bi-pause-fill');
        wave.classList.add('active2');
    }else{
        music.pause();
        masterPlay.classList.remove('bi-pause-fill');
        masterPlay.classList.add('bi-play-fill');
        wave.classList.remove('active2');
    }
})

const makeAllPlays = () =>{
    Array.from(document.getElementsByClassName('playListPlay')).forEach((element)=>{
            element.classList.add('bi-play-circle-fill');
            element.classList.remove('bi-pause-circle-fill');
    })
}
const makeAllBackgrounds = () =>{
    Array.from(document.getElementsByClassName('songItem')).forEach((element)=>{
            element.style.background = `rgb(105,105,170,0)`;
    })
}



let index = 0;
let posterMasterPlay = document.getElementById('posterMasterPlay');
let title = document.getElementById('title');

Array.from(document.getElementsByClassName('playListPlay')).forEach((element)=>{
    element.addEventListener('click', (e)=>{
        index = e.target.id;
        makeAllPlays();
        e.target.classList.remove('bi-play-circle-fill');
        e.target.classList.add('bi-pause-circle-fill');
        
        music.src = `audio/${index}.mp3`;
        posterMasterPlay.src = `img/${index}.webp`;
        music.play();
        
        let songTitle = songs.filter((ele)=>{
            return ele.id == index;
        })

        songTitle.forEach(ele =>{
            let {songName} = ele;
            title.innerHTML = songName;
        })

        masterPlay.classList.remove('bi-play-fill');
        masterPlay.classList.add('bi-pause-fill');
        wave.classList.add('active2');

        // removed source code from original

        // music.addEventListener('ended', ()=>{
        //     masterPlay.classList.remove('bi-pause-fill');
        //     masterPlay.classList.add('bi-play-fill');
        //     wave.classList.remove('active2');
        // })

        makeAllBackgrounds();
        Array.from(document.getElementsByClassName('songItem'))[`${index-1}`].style.background = `rgb(105,105,170,0.1)`;
    })
})

let currentStart = document.getElementById('currentStart');
let currentEnd = document.getElementById('currentEnd');
let seek = document.getElementById('seek');
let bar2 = document.getElementById('bar2');
let dot = document.getElementById('dot1');

music.addEventListener('timeupdate', ()=>{
    let music_curr = music.currentTime;
    let music_dur = music.duration;

    let min = Math.floor(music_dur/60);
    let sec = Math.floor(music_dur%60);
    if(sec<10){
        sec = `0${sec}`;
    }
    currentEnd.innerHTML = `${min}:${sec}`;

    let min1 = Math.floor(music_curr/60);
    let sec1 = Math.floor(music_curr%60);
    if(sec1<10){
        sec1 = `0${sec1}`;
    }
    currentStart.innerHTML = `${min1}:${sec1}`;

    let progressBar = parseInt((music.currentTime/music.duration)*100);
    seek.value = progressBar;
    let seekbar = seek.value;
    bar2.style.width = `${seekbar}%`;
    dot.style.left  = `${seekbar}%`;
})

seek.addEventListener('change', ()=>{
    music.currentTime = seek.value * music.duration/100;
})

music.addEventListener('ended', ()=>{
    masterPlay.classList.remove('bi-pause-fill');
    masterPlay.classList.add('bi-play-fill');
    wave.classList.remove('active2');

    // custom edit from original source

    index = parseInt(index) + 1;

    music.src = `audio/${index}.mp3`;
    posterMasterPlay.src = `img/${index}.webp`;
    music.play();

    let songTitle = songs.filter((ele)=>{
        return ele.id == index;
    })

    songTitle.forEach(ele =>{
        let {songName} = ele;
        title.innerHTML = songName;
    })

    makeAllPlays();

        document.getElementById('masterPlay').classList.remove('bi-play-fill');
        document.getElementById('masterPlay').classList.add('bi-pause-fill');

        
        wave.classList.add('active2');
        

        document.getElementById(`${index}`).classList.remove('bi-play-circle-fill');
        document.getElementById(`${index}`).classList.add('bi-pause-circle-fill');

    
    makeAllBackgrounds();
    Array.from(document.getElementsByClassName('songItem'))[`${index-1}`].style.background = `rgb(105,105,170,0.1)`;
})

let vol_icon = document.getElementById('vol-icon');
let vol = document.getElementById('vol');
let vol_dot = document.getElementById('vol-dot');
let vol_bar = document.getElementById('vol-bar');

vol.addEventListener('change', ()=>{
    if(vol.value == 0){
        vol_icon.classList.remove('bi-volume-down-fill');
        vol_icon.classList.add('bi-volume-mute-fill');
        vol_icon.classList.remove('bi-volume-up-fill');
    }
    if(vol.value > 0){
        vol_icon.classList.add('bi-volume-down-fill');
        vol_icon.classList.remove('bi-volume-mute-fill');
        vol_icon.classList.remove('bi-volume-up-fill');
    }
    if(vol.value > 50){
        vol_icon.classList.remove('bi-volume-down-fill');
        vol_icon.classList.remove('bi-volume-mute-fill');
        vol_icon.classList.add('bi-volume-up-fill');
    }

    let vol_a = vol.value;
    vol_bar.style.width = `${vol_a}%`;
    vol_dot.style.left = `${vol_a}%`;

    music.volume = vol_a/100;
})

let back = document.getElementById('back');
let next = document.getElementById('next');

back.addEventListener('click', ()=>{
    index -= 1;
    if(index < 1){
        index = Array.from(document.getElementsByClassName('songItem')).length;
    }   

        music.src = `audio/${index}.mp3`;
        posterMasterPlay.src = `img/${index}.webp`;
        music.play();
        
        let songTitle = songs.filter((ele)=>{
            return ele.id == index;
        })

        songTitle.forEach(ele =>{
            let {songName} = ele;
            title.innerHTML = songName;
        })

        makeAllPlays();

        document.getElementById(`${index}`).classList.remove('bi-play-fill');
        document.getElementById(`${index}`).classList.add('bi-pause-fill');
        
        makeAllBackgrounds();
        Array.from(document.getElementsByClassName('songItem'))[`${index-1}`].style.background = `rgb(105,105,170,0.1)`;
})


next.addEventListener('click', ()=>{
    index -= 0;
    index += 1;
    if(index > Array.from(document.getElementsByClassName('songItem')).length){
        index = 1;
    }
        music.src = `audio/${index}.mp3`;
        posterMasterPlay.src = `img/${index}.webp`;
        music.play();
        
        let songTitle = songs.filter((ele)=>{
            return ele.id == index;
        })

        songTitle.forEach(ele =>{
            let {songName} = ele;
            title.innerHTML = songName;
        })

        makeAllPlays();

        document.getElementById(`${index}`).classList.remove('bi-play-fill');
        document.getElementById(`${index}`).classList.add('bi-pause-fill');
        
        makeAllBackgrounds();
})

