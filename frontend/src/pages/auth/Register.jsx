import GoogleImage from "../../assets/images/auth/google.png";
import GithubImage from "../../assets/images/auth/github.png";
import LinkedinImage from "../../assets/images/auth/linkedin.png";

export default function Registerform() {
  return (
    <div className="min-h-screen flex items-center justify-center ">
      <div className="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-xl">
        <h2 className="text-3xl font-bold mb-6 text-center bg-clip-text text-gray-900">
          Inscription
        </h2>
        <form method="post" action="/register">
          <div className="mb-4">
            <label className="block text-lg font-medium text-gray-700">
              Name
            </label>
            <input
              type="text"
              placeholder="Entrez votre email"
              className="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent text-gray-900"
              name="name"
            />
          </div>
          <div className="mb-4">
            <label className="block text-lg font-medium text-gray-700">
              Email
            </label>
            <input
              type="email"
              placeholder="Entrez votre email"
              className="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent text-gray-900"
              name="email"
            />
          </div>
          <div className="mb-4">
            <label className="block text-lg font-medium text-gray-700">
              Telephone
            </label>
            <input
              type="tel"
              placeholder="Entrez votre numero de telephone"
              className="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent text-gray-900"
              name="telephone"
            />
          </div>
          <div className="mb-6">
            <label className="block text-lg font-medium text-gray-700">
              Mot de passe
            </label>
            <input
              type="password"
              placeholder="Entrez votre mot de passe"
              className="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent text-gray-900"
              name="password"
            />
          </div>
          <button
            type="submit"
            className="text-lg w-full bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 text-white py-2 px-4 rounded-lg shadow-lg  focus:outline-none focus:ring-2 "
          >
            S inscrire
          </button>
        </form>

        <div className="mt-6">
          <div className="relative">
            <div className="absolute inset-0 flex items-center">
              <div className="w-full border-t border-gray-300"></div>
            </div>
            <div className="relative flex justify-center text-lg">
              <span className="px-2 bg-white text-gray-500">
                Ou continuez avec
              </span>
            </div>
          </div>

          <div className="mt-6 grid grid-cols-3 gap-3">
            <button
              type="button"
              className="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:shadow-md"
            >
              <img src={GoogleImage} alt="Google" className="h-6 w-6" />
            </button>
            <button
              type="button"
              className="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:shadow-md"
            >
              <img src={GithubImage} alt="GitHub" className="h-6 w-6" />
            </button>
            <button
              type="button"
              className="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:shadow-md"
            >
              <img src={LinkedinImage} alt="LinkedIn" className="h-6 w-6" />
            </button>
          </div>
        </div>

        {/* <p className="mt-6 text-center text-lg text-gray-600">
          Mot de passe oublié ?{" "}
          <a
            href="/forgot-password"
            className="text-purple-600 hover:underline"
          >
            Réinitialiser
          </a>
        </p> */}
        <p className="mt-2 text-center text-lg text-gray-600">
          Vous avez déjà un compte ? {""}
          <a href="/login" className="text-purple-600 hover:underline text-lg">
            Connectez-vous
          </a>
        </p>
      </div>
    </div>
  );
}
