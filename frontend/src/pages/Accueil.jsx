
// const LoginForm = () => {
//   return (
//     <div className="min-h-screen flex items-center justify-center ">
//       <div className="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md">
//         <h2 className="text-3xl font-bold mb-6 text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600">
//           Connexion
//         </h2>
//         <form>
//           <div className="mb-4">
//             <label className="block text-sm font-medium text-gray-700">Email</label>
//             <input
//               type="email"
//               placeholder="Entrez votre email"
//               className="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
//             />
//           </div>
//           <div className="mb-6">
//             <label className="block text-sm font-medium text-gray-700">Mot de passe</label>
//             <input
//               type="password"
//               placeholder="Entrez votre mot de passe"
//               className="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
//             />
//           </div>
//           <button
//             type="submit"
//             className="w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-2 px-4 rounded-lg shadow-lg hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-purple-500"
//           >
//             Se connecter
//           </button>
//         </form>

//         <div className="mt-6">
//           <div className="relative">
//             <div className="absolute inset-0 flex items-center">
//               <div className="w-full border-t border-gray-300"></div>
//             </div>
//             <div className="relative flex justify-center text-sm">
//               <span className="px-2 bg-white text-gray-500">Ou continuez avec</span>
//             </div>
//           </div>

//           <div className="mt-6 grid grid-cols-3 gap-3">
//             <button
//               type="button"
//               className="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:shadow-md"
//             >
//               <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" className="h-5 w-5" />
//             </button>
//             <button
//               type="button"
//               className="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:shadow-md"
//             >
//               <img src="https://www.svgrepo.com/show/512317/github-142.svg" alt="GitHub" className="h-5 w-5" />
//             </button>
//             <button
//               type="button"
//               className="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:shadow-md"
//             >
//               <img src="https://www.svgrepo.com/show/448234/linkedin.svg" alt="LinkedIn" className="h-5 w-5" />
//             </button>
//           </div>
//         </div>

//         <p className="mt-6 text-center text-sm text-gray-600">
//           Mot de passe oublié ?{" "}
//           <a href="/forgot-password" className="text-purple-600 hover:underline">
//             Réinitialiser
//           </a>
//         </p>
//         <p className="mt-2 text-center text-sm text-gray-600">
//           Pas encore de compte ?{" "}
//           <a href="/register" className="text-purple-600 hover:underline">
//             Inscrivez-vous
//           </a>
//         </p>
//       </div>
//     </div>
//   );
// };

// export default LoginForm;
export default function Accueil(){
  return(
    <h1 className="text-3xl font-bold text-center text-gray-900">page Acceuil</h1>
  );
}