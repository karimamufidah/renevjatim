class LimCRUD {
  constructor(auth) {
    this.auth = auth;
  }

  async create({
    url,
    data,
    name
  }) {
    return await fetch(`${url}`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Authorization": this.auth
      },
      body: JSON.stringify(data)
    }).then(response => {
      if (response.ok) {
        return response.json();
      } else {
        throw `Gagal menambahkan data ${name}!`;
      }
    }).then(responseJSON => {
      return responseJSON;
    });
  }

  async createPlain({
    url,
    data,
    name
  }) {
    return await fetch(`${url}`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Authorization": this.auth
      },
      body: data
    }).then(response => {
      if (response.ok) {
        return response.json();
      } else {
        throw `Gagal menambahkan data ${name}!`;
      }
    }).then(responseJSON => {
      return responseJSON;
    });
  }

  async read({
    url,
    name
  }) {
    return await fetch(`${url}`, {
      headers: {
        "Content-Type": "application/json",
        "Authorization": this.auth
      },
    }).then(response => {
      if (response.ok) {
        return response.json();
      } else {
        throw `Data ${name} tidak ditemukan!`;
      }
    }).then(responseJSON => {
      return responseJSON.data;
    });
  }

  async update({
    url,
    data,
    name
  }) {
    return await fetch(`${url}`, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
        "Authorization": this.auth
      },
      body: JSON.stringify(data)
    }).then(response => {
      if (response.ok) {
        return response.json();
      } else {
        throw `Gagal mengubah data ${name}!`;
      }
    }).then(responseJSON => {
      return responseJSON;
    });
  }

  async updatePatch({
    url,
    data,
    name
  }) {
    return await fetch(`${url}`, {
      method: "PATCH",
      headers: {
        "Content-Type": "application/json",
        "Authorization": this.auth
      },
      body: JSON.stringify(data)
    }).then(response => {
      if (response.ok) {
        return response.json();
      } else {
        throw `Gagal mengubah data ${name}!`;
      }
    }).then(responseJSON => {
      return responseJSON;
    });
  }

  async delete({
    url,
    data,
    name
  }) {
    return await fetch(`${url}`, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
        "Authorization": this.auth
      },
      body: JSON.stringify(data)
    }).then(response => {
      if (response.ok) {
        return response.json();
      } else {
        throw `Gagal menambahkan data ${name}!`;
      }
    }).then(responseJSON => {
      return responseJSON;
    });
  }
}
