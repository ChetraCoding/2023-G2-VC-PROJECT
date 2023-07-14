// Reference from: https://stackoverflow.com/questions/66891025/how-to-retreive-json-web-token-with-axios-in-vue

import axios from "axios";
import { useCookieStore } from "@/stores/cookie";

const BASE_URL = "http://172.16.0.142:8000/api/";
const http = axios.create({
  baseURL: BASE_URL,
});

http.interceptors.request.use((config) => {
  const { getCookie } = useCookieStore();
  const token = getCookie("user_token");
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  config.headers["Content-Type"] = "application/json";
  return config;
});

export default http;
