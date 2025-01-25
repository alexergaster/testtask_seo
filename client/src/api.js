import axios from "axios";

const API_URL = "http://127.0.0.1:8000/api";

export const goLink = async (url) => {
  const response = await axios.get(`${url}`);

  return response.data;
};

export const getProducts = async (param) => {
  const response = await axios.get(`${API_URL}/products`, {
    params: param,
  });

  return response.data;
};

export const getProduct = async (id) => {
  const response = await axios.get(`${API_URL}/products/${id}`);

  return response.data;
};
export const getCategories = async () => {
  const response = await axios.get(`${API_URL}/categories`);

  return response.data;
};
