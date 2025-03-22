// // import { useState } from "react"; 

// export default function Formulaire() {
//   // const [accountType, setAccountType] = useState(""); 

//   // const handleAccountTypeChange = (e) => {
//   //   setAccountType(e.target.value); 
//   // };

//   return (
//     // <div className="h-screen flex items-center justify-center ">
//     <form method="POST" className="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-xl space-y-6 mt-4">
//       <h1 className="text-2xl font-semibold text-center text-gray-800">Create Account</h1>

//       <div className="space-y-4">
//         <div>
//           <label htmlFor="numberAccount" className="block text-sm font-medium text-gray-700">Number Account</label>
//           <input
//             id="numberAccount"
//             type="text"
//             name="numberAccount"
//             className="text-gray-800 bg-gray-100 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
//             placeholder="Enter number"
//           />
//         </div>

//         <div>
//           <label htmlFor="holderName" className="block text-sm font-medium text-gray-700">Holder Name</label>
//           <input
//             id="holderName"
//             type="text"
//             name="holderName"
//             className="text-gray-800 bg-gray-100 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
//             placeholder="Enter holder name"
//           />
//         </div>

//         <div>
//           <label htmlFor="balance" className="block text-sm font-medium text-gray-700">Balance</label>
//           <input
//             id="balance"
//             type="number"
//             name="balance"
//             className="text-gray-800 bg-gray-100 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
//             placeholder="Enter balance"
//           />
//         </div>

//         <div>
//           <label htmlFor="accountType" className="block text-sm font-medium text-gray-700">Type Account</label>
//           <select
//             id="accountType"
//             name="accountType"
//             className="text-gray-800 bg-gray-100 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
//             value={accountType}
//             onChange={handleAccountTypeChange} // Gère le changement du select
//           >
//             <option value="">Select an account type</option>
//             <option value="currentAccount">Current Account</option>
//             <option value="savingAccount">Saving Account</option>
//             <option value="businessAccount">Business Account</option>
//           </select>
//         </div>

//         {/* Affiche un champ supplémentaire selon le type de compte */}
//         {accountType === "currentAccount" && (
//           <div>
//             <label htmlFor="currentAccountInput" className="block text-sm font-medium text-gray-700">Current Account Specific Field</label>
//             <input
//               id="currentAccountInput"
//               type="text"
//               className="text-gray-800 bg-gray-100 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
//               placeholder="overdraftLimit"
//               name="overdraftLimit"
//             />
//           </div>
//         )}

//         {accountType === "savingAccount" && (
//           <div>
//             <label htmlFor="savingAccountInput" className="block text-sm font-medium text-gray-700">Saving Account Specific Field</label>
//             <input
//               id="savingAccountInput"
//               type="text"
//               className="text-gray-800 bg-gray-100 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
//               placeholder="interestRate"
//               name="interestRate"
//             />
//           </div>
//         )}

//         {accountType === "businessAccount" && (
//           <div>
//             <label htmlFor="businessAccountInput" className="block text-sm font-medium text-gray-700">Business Account Specific Field</label>
//             <input
//               id="businessAccountInput"
//               type="text"
//               className="text-gray-800 bg-gray-100 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
//               placeholder="transactionFee"
//                name="transactionFee"
//             />
//           </div>
//         )}

//         <div className="flex justify-center">
//           <button type="submit" className="w-full px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
//             Create Account
//           </button>
//         </div>
//       </div>
//     </form>
//     // </div>
//   );
// }
