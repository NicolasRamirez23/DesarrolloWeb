import { initializeApp } from 'firebase/app'
import { 
    getFirestore, collection, getDocs, onSnapshot, getDoc,
    addDoc, updateDoc, deleteDoc, doc
} from 'firebase/firestore'

const firebaseConfig = {
    apiKey: "AIzaSyBXuwxWB9IJjAx8dJ2P2pOAlitSJ5fUTEI",
    authDomain: "pruebas-15eee.firebaseapp.com",
    projectId: "pruebas-15eee",
    storageBucket: "pruebas-15eee.appspot.com",
    messagingSenderId: "1006662840849",
    appId: "1:1006662840849:web:a772bcc17ed001f73ef7b0",
    measurementId: "G-EDMX39FC87"
  };

//Iniciar firebase app
initializeApp(firebaseConfig)

//iniciar servicios
const db = getFirestore()

//Colección de referencias
const colRef = collection(db, 'Registros')

//Obtener la coleccion de información
getDocs(colRef)
.then((snapshot) => {
    let registros = []

    snapshot.docs.forEach((doc) => {
        registros.push({ ...doc.data(), id: doc.id })

    })
    //console.log(registros)
})
.catch(err => {
    console.log(err.message)
})

//Obtener la coleccion de información tiempo real
onSnapshot(colRef, (snapshot) => {
    let registros = []

    snapshot.docs.forEach((doc) => {
        registros.push({ ...doc.data(), id: doc.id })

    })
    //console.log(registros)
})
console.log("hola")

const docRef = doc(db, 'Registros', 'NXj5t72Z1rMYWoKV45Bi')

onSnapshot(docRef, (doc) => {
    console.log(doc.data(), doc.id)
})

const agregarRegistro = document.querySelector('.agregar')
agregarRegistro.addEventListener('click', async (e) =>{
    e.preventDefault()

    const docRef = doc(db, 'Registros', 'NXj5t72Z1rMYWoKV45Bi')
    const docSnap = await getDoc(docRef);
    const currentRegistros = docSnap.data().registros;
    
    await updateDoc(docRef, {
        registros: currentRegistros + 10
    })
})

const eliminarRegistro = document.querySelector('.eliminar')
eliminarRegistro.addEventListener('click', async (e) =>{
    e.preventDefault()

    const docRef = doc(db, 'Registros', 'NXj5t72Z1rMYWoKV45Bi')
    const docSnap = await getDoc(docRef);
    const currentRegistros = docSnap.data().registros;
    
    await updateDoc(docRef, {
        registros: currentRegistros - 1
    })
})
