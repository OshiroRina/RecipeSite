import axios from "axios";

export async function getPeriod(startDate: string,endDate: string) {
    const res = await axios.post("/api/analysis", {
        startDate: startDate,
        endDate: endDate
    });
    return res.data;
}
