// import axios from "axios";
import axios from "axios";
import { useCookieStore } from "@/stores/cookie";

const BASE_URL = "http://172.16.0.142:8000/api/";
const http = axios.create({
  baseURL: BASE_URL,
});

http.interceptors.request.use((config) => {
  const cookieStore = useCookieStore();
  const token = cookieStore.getCookie("user_token");
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
    config.headers["Content-Type"] = "application/json";
  }
  return config;
});

export default http;
